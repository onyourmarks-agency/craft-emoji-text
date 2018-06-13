<?php
/**
 * TDE Emoji text plugin for Craft CMS 3.x
 *
 * This plugin bypasses the error X
 *
 * @link      https://www.tde.nl/en/
 * @copyright Copyright (c) 2018 TDE B.V.
 */

namespace tde\tdeemojitext;

use tde\tdeemojitext\fields\EmojiText as EmojiTextField;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class TdeEmojiText
 *
 * @author    TDE B.V.
 * @package   TdeEmojiText
 * @since     1.0.0
 *
 */
class TdeEmojiText extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var TdeEmojiText
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

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
                $event->types[] = EmojiTextField::class;
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'tde-emoji-text',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
