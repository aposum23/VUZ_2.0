<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%audience}}`.
 */
class m230115_192333_add_width_column_to_audience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%audience}}', 'width', $this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%audience}}', 'width');
    }
}
