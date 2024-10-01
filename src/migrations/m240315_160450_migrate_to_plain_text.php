<?php

declare(strict_types=1);

namespace oym\craft\emojitext\migrations;

use craft\db\Migration;
use craft\db\Query;
use craft\db\Table;
use craft\fields\PlainText;
use craft\helpers\Db;
use craft\records\Element;
use craft\records\Field;
use oym\craft\emojitext\fields\EmojiText;

/**
 * m240315_160450_migrate_to_plain_text migration.
 */
class m240315_160450_migrate_to_plain_text extends Migration
{
    public function safeUp(): bool
    {
        $fields = Field::findAll([
            'type' => EmojiText::class,
        ]);

        foreach ($fields as $field) {
            $layoutElementUid = (new Query())
                ->select(['layoutElementUid'])
                ->from(Table::CHANGEDFIELDS)
                ->where([
                    'fieldId' => $field->id,
                ])->scalar();

            $query = sprintf(
                'SELECT 
                    '. $_ENV['CRAFT_DB_TABLE_PREFIX'] .'elements_sites.id,
                    '. $_ENV['CRAFT_DB_TABLE_PREFIX'] .'elements_sites.content
                FROM '. $_ENV['CRAFT_DB_TABLE_PREFIX'] .'elements_sites
                WHERE JSON_EXTRACT('. $_ENV['CRAFT_DB_TABLE_PREFIX'] .'elements_sites.content, \'$."%s"\') IS NOT NULL
                ',
                $layoutElementUid
            );

            $elementsSite = \Craft::$app->getDb()->createCommand($query)->queryAll();

            foreach ($elementsSite as $elementSite) {
                try {
                    $content = json_decode($elementSite['content'], true);
                    $content[$layoutElementUid] = \base64_decode($content[$layoutElementUid]);
                } catch (\Throwable $e) {
                    continue;
                }

                try {
                    \Craft::$app->getDb()->createCommand()->update(
                        $_ENV['CRAFT_DB_TABLE_PREFIX'] .'elements_sites',
                        ['content' => $content],
                        ['id' => $elementSite['id']]
                    )->execute();
                } catch (\Throwable $e) {
                    // try again, but with character encoding (we do not want to tamper with the data if it is not necessary)
                    \Craft::$app->getDb()->createCommand()->update(
                        $_ENV['CRAFT_DB_TABLE_PREFIX'] .'elements_sites',
                        ['content' => mb_convert_encoding($content, 'UTF-8', 'UTF-8')],
                        ['id' => $elementSite['id']]
                    )->execute();
                }
            }
        }

        $this->update(
            Table::FIELDS,
            ['type' => PlainText::class],
            ['type' => EmojiText::class]
        );

        return true;
    }

    public function safeDown(): bool
    {
        return false;
    }
}
