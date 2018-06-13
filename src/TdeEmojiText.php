<?php
/**
 * TDE Emoji text plugin for Craft CMS 3.x
 *
 * @link      https://www.tde.nl/en/
 * @copyright Copyright (c) 2018 TDE B.V.
 */

namespace TDE\EmojiText;

use TDE\EmojiText\fields\EmojiText;

use Craft;
use craft\base\Plugin;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class TdeEmojiText
 *
 * @author    TDE B.V.
 * @package   TDE\EmojiText
 * @since     1.0.0
 *
 */
class TdeEmojiText extends Plugin
{
    /**
     * @var TdeEmojiText
     */
    public static $plugin;

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = EmojiText::class;
            }
        );
    }
}
