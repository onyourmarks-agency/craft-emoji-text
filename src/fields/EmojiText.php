<?php
/**
 * TDE Emoji text plugin for Craft CMS 3.x
 *
 * @link      https://www.tde.nl/en/
 * @copyright Copyright (c) 2018 TDE B.V.
 */

namespace TDE\EmojiText\fields;

use craft\base\ElementInterface;
use craft\base\Field;
use craft\fields\PlainText;

/**
 * @author    TDE B.V.
 * @package   TDE\EmojiText
 * @since     1.0.0
 */
class EmojiText extends Field
{
    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return 'TDE Emoji text';
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return parent::getSettingsHtml();
    }


    /**
     * @inheritdoc
     */
    public function normalizeValue($value, ElementInterface $element = null)
    {
        if (base64_encode(base64_decode($value, true)) === $value) {
            return parent::normalizeValue(base64_decode($value), $element);
        }

        return parent::normalizeValue($value, $element);
    }

    /**
     * @inheritdoc
     */
    public function serializeValue($value, ElementInterface $element = null)
    {
        return parent::serializeValue(base64_encode($value), $element);
    }

    /**
     * @inheritdoc
     */
    public function getInputHtml($value, ElementInterface $element = null): string
    {
        return parent::getInputHtml($value, $element);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['initialRows', 'charLimit'], 'integer', 'min' => 1];
        $rules[] = [['charLimit'], 'validateCharLimit'];

        return $rules;
    }

}
