<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subdivision}}`.
 */
class m230111_072116_create_subdivision_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subdivision}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'building_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk-subdivision-building_id',
            'subdivision',
            'building_id',
            'building',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-subdivision-building_id', 'subdivision');
        $this->dropTable('{{%subdivision}}');
    }
}
