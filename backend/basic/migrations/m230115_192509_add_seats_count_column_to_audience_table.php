<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%audience}}`.
 */
class m230115_192509_add_seats_count_column_to_audience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%audience}}', 'seats_count', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%audience}}', 'seats_count');
    }
}
