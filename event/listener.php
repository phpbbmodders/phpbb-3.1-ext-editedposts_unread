<?php
/**
*
* @package Mark edited posts unread
* @copyright (c) 2015 RMcGirr83
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbmodders\editedposts_unread\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\db\driver\driver */
	protected $db;

	/** @var string phpBB root path */
	protected $phpbb_root_path;

	/** @var string PHP extension */
	protected $php_ext;

	public function __construct(\phpbb\db\driver\driver_interface $db, $phpbb_root_path, $php_ext)
	{
		$this->db = $db;
		$this->root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.submit_post_end' => 'submit_post_end',
		);
	}

	public function submit_post_end($event)
	{
		if($event['mode'] == 'edit')
		{
			// we need to ensure that what we are resetting is appropriate
			// do we care about when someone edits the first post of a topic?
			// $event['data']['topic_first_post_id'] == $event['data']['post_id'] $post_mode = 'edit_first_post'

			$ext_post_mode = '';
			if($event['data']['topic_posts_approved'] + $event['data']['topic_posts_unapproved'] + $event['data']['topic_posts_softdeleted'] == 1)
			{
				$ext_post_mode = 'edit_topic';
			}
			else if($event['data']['topic_last_post_id'] == $event['data']['post_id'])
			{
				$ext_post_mode = 'edit_last_post';
			}

			if($ext_post_mode == 'edit_last_post' || $ext_post_mode == 'edit_topic')
			{
				$sql_update_posts = 'UPDATE ' . POSTS_TABLE . '
					SET post_time = ' . time() . '
					WHERE post_id = ' . $event['data']['post_id'] . '
						AND topic_id = ' . $event['data']['topic_id'];
				$this->db->sql_query($sql_update_posts);

				$sql_update_topics = 'UPDATE ' . TOPICS_TABLE . '
					SET topic_last_post_time = ' . time() . '
					WHERE topic_id = ' . $event['data']['topic_id'];
				$this->db->sql_query($sql_update_topics);

				if(!function_exists('markread'))
				{
					include ($this->phpbb_root_path . 'includes/functions_posting.' . $this->phpEx);
				}

				update_post_information('forum', $event['data']['forum_id']);
				markread('post', $event['data']['forum_id'], $event['data']['topic_id'], $event['data']['post_time']);
			}
		}
	}
}
