<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230111_072211_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(100)->notNull(),
            'is_student' => $this->boolean()->notNull(),
            'student_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-user-student_id',
            'user',
            'student_id',
            'student',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user-student_id', 'user');
        $this->dropTable('{{%user}}');
    }
}
