<?php

declare(strict_types=1);

namespace oym\craft\emojitext\fields;

use craft\base\ElementInterface;
use craft\fields\PlainText;

class EmojiText extends PlainText
{
    public static function displayName(): string
    {
        return 'OYM Emoji text';
    }

    public function normalizeValue(mixed $value, ?ElementInterface $element = null): mixed
    {
        if (base64_encode(base64_decode($value, true)) === $value) {
            return parent::normalizeValue(base64_decode($value), $element);
        }

        return parent::normalizeValue($value, $element);
    }

    public function serializeValue(mixed $value, ?ElementInterface $element = null): mixed
    {
        return parent::serializeValue(base64_encode($value), $element);
    }
}
