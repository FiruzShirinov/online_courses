<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_lesson}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%lesson}}`
 */
class m230806_125130_create_junction_table_for_user_and_lesson_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_lesson}}', [
            'user_id' => $this->integer(),
            'lesson_id' => $this->integer(),
            'PRIMARY KEY(user_id, lesson_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_lesson-user_id}}',
            '{{%user_lesson}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_lesson-user_id}}',
            '{{%user_lesson}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `lesson_id`
        $this->createIndex(
            '{{%idx-user_lesson-lesson_id}}',
            '{{%user_lesson}}',
            'lesson_id'
        );

        // add foreign key for table `{{%lesson}}`
        $this->addForeignKey(
            '{{%fk-user_lesson-lesson_id}}',
            '{{%user_lesson}}',
            'lesson_id',
            '{{%lesson}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_lesson-user_id}}',
            '{{%user_lesson}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_lesson-user_id}}',
            '{{%user_lesson}}'
        );

        // drops foreign key for table `{{%lesson}}`
        $this->dropForeignKey(
            '{{%fk-user_lesson-lesson_id}}',
            '{{%user_lesson}}'
        );

        // drops index for column `lesson_id`
        $this->dropIndex(
            '{{%idx-user_lesson-lesson_id}}',
            '{{%user_lesson}}'
        );

        $this->dropTable('{{%user_lesson}}');
    }
}
