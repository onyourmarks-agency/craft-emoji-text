<?php

namespace tde\craft\emojitext\migrations;

use Craft;
use craft\db\Migration;
use craft\db\Table;
use tde\craft\emojitext\fields\EmojiText;
use tde\craft\geoaddress\fields\GeoAddressField;

/**
 * m220517_094228_update_field_handle migration.
 */
class m220517_094228_update_field_handle extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
        $this->update(
            Table::FIELDS,
            [
                'type' => EmojiText::class,
            ],
            [
                'type' => 'TDE\EmojiText\fields\EmojiText',
            ]
        );

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        $this->update(
            Table::FIELDS,
            [
                'type' => 'TDE\EmojiText\fields\EmojiText',
            ],
            [
                'type' => EmojiText::class,
            ]
        );

        return false;
    }
}
