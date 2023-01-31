<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%audience}}`.
 */
class m230115_194216_add_floor_column_to_audience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%audience}}', 'floor', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%audience}}', 'floor');
    }
}
