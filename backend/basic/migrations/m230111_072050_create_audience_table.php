<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%audience}}`.
 */
class m230111_072050_create_audience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%audience}}', [
            'id' => $this->primaryKey(),
            'parent_subdivision' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-audience-parent_subdivision',
            'audience',
            'parent_subdivision',
            'subdivision',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-audience-type',
            'audience',
            'type',
            'audienceType',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-audience-parent_subdivision', 'audience');
        $this->dropForeignKey('fk-audience-type', 'audience');
        $this->dropTable('{{%audience}}');
    }
}
