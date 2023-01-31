<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m230111_072151_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'last_name' => $this->string(50)->notNull(),
            'first_name' => $this->string(50)->notNull(),
            'midle_name' => $this->string(50),
            'birth_date' => $this->date()->notNull(),
            'place_of_residence' => $this->string(400)->notNull(),
            'residential_address' => $this->string(400)->notNull(),
            'phone_number' => $this->string(10)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');
    }
}
