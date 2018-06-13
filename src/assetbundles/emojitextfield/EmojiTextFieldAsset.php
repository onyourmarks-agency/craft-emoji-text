<?php
/**
 * TDE Emoji text plugin for Craft CMS 3.x
 *
 * This plugin bypasses the error X
 *
 * @link      https://www.tde.nl/en/
 * @copyright Copyright (c) 2018 TDE B.V.
 */

namespace tde\tdeemojitext\assetbundles\emojitextfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    TDE B.V.
 * @package   TdeEmojiText
 * @since     1.0.0
 */
class EmojiTextFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@tde/tdeemojitext/assetbundles/emojitextfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/EmojiText.js',
        ];

        $this->css = [
            'css/EmojiText.css',
        ];

        parent::init();
    }
}
