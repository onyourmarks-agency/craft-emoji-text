# TDE Emoji text plugin for Craft CMS 3.x

This plugin bypasses the error "X cannot contain emoji". 

In short terms, instead of storing the data as plain text, we'll store the data as a Base64 encoded string.

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require TdeNL/tde-emoji-text

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for TDE Emoji text.

## Using TDE Emoji text

In the admin panel, create a new field.
 - Select Emoji Text
 - Configure the options (it just wraps the regular text field)
 - You're done :-)
 
Brought to you by [TDE B.V.](https://www.tde.nl/en/)
