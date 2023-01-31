<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%audience}}`.
 */
class m230113_204310_add_anumber_column_to_audience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%audience}}', 'anumber', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%audience}}', 'anumber');
    }
}
