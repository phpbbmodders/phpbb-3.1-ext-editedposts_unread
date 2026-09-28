# Mark Edited Posts Unread

[![Tests](https://github.com/phpbbmodders/phpbb-3.1-ext-editedpostsunread/actions/workflows/tests.yml/badge.svg)](https://github.com/phpbbmodders/phpbb-3.1-ext-editedpostsunread/actions/workflows/tests.yml) [![Lint](https://github.com/phpbbmodders/phpbb-3.1-ext-editedpostsunread/actions/workflows/lint.yml/badge.svg)](https://github.com/phpbbmodders/phpbb-3.1-ext-editedpostsunread/actions/workflows/lint.yml)

Marks a topic unread again when its last post is edited.

## Features

- Editing the last post in a topic (or the only post) moves its time to now, so the topic shows as unread for everyone.
- Edits to earlier posts are left alone.
- No settings.

## Requirements

- phpBB 3.3.19 or later
- PHP 7.4 or later

## Installation

1. Copy the extension to `/ext/phpbbmodders/editedpostsunread`
2. In the Administration Control Panel, go to **Customise → Manage extensions**
3. Enable the **Mark Edited Posts Unread** extension

### Upgrading from `phpbbmodders/editedposts_unread`

This extension was renamed from `editedposts_unread` to `editedpostsunread` to meet phpBB's extension naming rules (no underscores). To switch an existing install:

1. Disable the old **Mark Edited Posts Unread** extension in the ACP. Do **not** delete its data.
2. Delete the `/ext/phpbbmodders/editedposts_unread` folder.
3. Upload this version to `/ext/phpbbmodders/editedpostsunread` and enable it. The old install's migration history is moved to the new name automatically.
4. Purge the board cache.

If you disable the old extension from the command line (`bin/phpbbcli.php`) instead of the ACP, run `bin/phpbbcli.php cache:purge` before enabling the new one; the command-line disable doesn't clear the cache.

## Contributing

Contributions are welcome!

- **Bug reports**: [Open an issue](https://github.com/phpbbmodders/phpbb-3.1-ext-editedpostsunread/issues).
- **Everything else** (questions, feature requests, ideas, general discussion): [Use Discussions](https://github.com/orgs/phpbbmodders/discussions), or the [community forum](https://www.phpbbmodders.com/community/).
- Pull requests are welcome for bug fixes or discussed features.

## Acknowledgments

- Original extension by Rich McGirr ([RMcGirr83](https://github.com/rmcgirr83)).
- Code review, bug fixes, and documentation assisted by [Claude](https://www.anthropic.com/claude).

## License

This extension is licensed under the **GNU General Public License v2.0**.

See [LICENSE.txt](LICENSE.txt) for more information.
