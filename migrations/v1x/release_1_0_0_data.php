<?php
/**
 *
 * Mark Edited Posts Unread extension for the phpBB Forum Software package
 *
 * @copyright (c) 2014 RMcGirr83
 * @copyright (c) 2026, phpBB Modders, https://www.phpbbmodders.com/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbbmodders\editedpostsunread\migrations\v1x;

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
