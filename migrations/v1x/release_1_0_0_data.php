<?php
/**
*
* @package Mark Edited Posts Unread
* @copyright (c) 2014 RMcGirr83
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbmodders\editedposts_unread\migrations\v1x;

class release_1_0_0_data extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['editedposts_unread_version']) && version_compare($this->config['editedposts_unread_version'], '1.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('editedposts_unread_version', '1.0.0')),
		);
	}

	public function revert_data()
	{
		return array(
			array('config.remove', array('editedposts_unread_version')),
		);
	}
}
