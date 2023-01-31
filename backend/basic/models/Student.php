<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%student}}".
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string|null $midle_name
 * @property string $birth_date
 * @property string $place_of_residence
 * @property string $residential_address
 * @property string $phone_number
 *
 * @property User[] $users
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%student}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'birth_date', 'place_of_residence', 'residential_address', 'phone_number'], 'required'],
            [['birth_date'], 'safe'],
            [['last_name', 'first_name', 'midle_name'], 'string', 'max' => 50],
            [['place_of_residence', 'residential_address'], 'string', 'max' => 400],
            [['phone_number'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'midle_name' => 'Midle Name',
            'birth_date' => 'Birth Date',
            'place_of_residence' => 'Place Of Residence',
            'residential_address' => 'Residential Address',
            'phone_number' => 'Phone Number',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['student_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\StudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\StudentQuery(get_called_class());
    }
}
