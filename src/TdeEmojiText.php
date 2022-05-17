<?php

namespace tde\craft\emojitext;

namespace tde\craft\emojitext;

use craft\base\Plugin;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use tde\craft\emojitext\fields\EmojiText;
use yii\base\Event;

class TdeEmojiText extends Plugin
{
    public static TdeEmojiText $plugin;

    public string $schemaVersion = '1.0.0';

    public function init(): void
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            static function (RegisterComponentTypesEvent $event) {
                $event->types[] = EmojiText::class;
            }
        );
    }
}
