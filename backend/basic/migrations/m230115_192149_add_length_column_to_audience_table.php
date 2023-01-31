<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%audience}}`.
 */
class m230115_192149_add_length_column_to_audience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%audience}}', 'length', $this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%audience}}', 'length');
    }
}
