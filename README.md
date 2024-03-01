# OYM Emoji text plugin for Craft CMS 4.x

This plugin bypasses the error "X cannot contain emoji". 

In short terms, instead of storing the data as plain text, we'll store the data as a Base64 encoded string.

## Requirements

This plugin requires Craft CMS 4.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require oym/craft-emoji-text

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for OYM Emoji text.

## Using OYM Emoji text

In the admin panel, create a new field.
 - Select Emoji Text
 - Configure the options (it just wraps the regular text field)
 - You're done :-)
 
Brought to you by [On Your Marks](https://www.onyourmarks.agency/en/)
