<?php

declare(strict_types=1);

namespace tde\craft\emojitext {
    class_alias('oym\\craft\\emojitext\\OymEmojiText', 'tde\\craft\\emojitext\\TdeEmojiText');

    spl_autoload_register(
        static function (string $className) {
            $old = 'tde\\craft\\emojitext\\';
            $new = 'oym\\craft\\emojitext\\';

            if (0 !== strpos($className, $old)) {
                return;
            }

            $newName = substr_replace($className, $new, 0, strlen($old));
            class_alias($newName, $className);
        },
        true,
        false,
    );

    if (!\class_exists(OymEmojiText::class)) {
        /** @deprecated this is an alias for \oym\craft\emojitext\OymEmojiText */
        class OymEmojiText
        {
        }
    }
}

namespace tde\craft\emojitext\fields {
    if (!\class_exists(EmojiText::class)) {
        /** @deprecated this is an alias for \oym\craft\emojitext\fields\EmojiText */
        class EmojiText
        {
        }
    }
}
