<?php

declare(strict_types=1);

namespace oym\craft\emojitext\migrations;

use Craft;
use craft\db\Migration;
use craft\db\Table;
use oym\craft\emojitext\fields\EmojiText;

/**
 * m220517_094228_update_field_handle migration.
 */
class m220517_094228_update_field_handle extends Migration
{
    public function safeUp(): bool
    {
        $this->update(
            Table::FIELDS,
            [
                'type' => EmojiText::class,
            ],
            [
                'type' => 'OYM\EmojiText\fields\EmojiText',
            ],
        );

        return true;
    }

    public function safeDown(): bool
    {
        $this->update(
            Table::FIELDS,
            [
                'type' => 'OYM\EmojiText\fields\EmojiText',
            ],
            [
                'type' => EmojiText::class,
            ],
        );

        return false;
    }
}
