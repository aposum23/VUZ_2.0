<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%audienceType}}`.
 */
class m230111_115838_create_audienceType_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%audienceType}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%audienceType}}');
    }
}
