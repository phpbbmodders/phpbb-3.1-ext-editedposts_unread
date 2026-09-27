phpbb-3.1-ext-editedpostsunread
===============================

This extension marks topic's last posts and first post as unread if they are edited.

## Installation

### 1. clone
Clone (or download and move) the repository into the folder /ext/phpbbmodders/editedpostsunread:

```
cd phpBB3
git clone https://github.com/phpbbmodders/phpbb-3.1-ext-editedpostsunread.git ext/phpbbmodders/editedpostsunread/
```

### 2. activate
Go to admin panel -> tab customise -> Manage extensions -> enable Mark Edited Posts Unread

## Upgrading from `phpbbmodders/editedposts_unread`

This extension was renamed from `editedposts_unread` to `editedpostsunread` to meet phpBB's extension naming rules (no underscores). To switch an existing install:

1. Disable the old **Mark Edited Posts Unread** extension in the ACP. Do **not** delete its data.
2. Delete the `/ext/phpbbmodders/editedposts_unread` folder.
3. Upload this version to `/ext/phpbbmodders/editedpostsunread` and enable it. The old install's migration history is moved to the new name automatically.
4. Purge the board cache.

If you disable the old extension from the command line (`bin/phpbbcli.php`) instead of the ACP, run `bin/phpbbcli.php cache:purge` before enabling the new one; the command-line disable doesn't clear the cache.
