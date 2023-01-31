<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%audiencetype}}".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Audience[] $audiences
 */
class Audiencetype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%audiencetype}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Audiences]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AudienceQuery
     */
    public function getAudiences()
    {
        return $this->hasMany(Audience::class, ['type' => 'id']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AudiencetypeQuery
     */
    public function getOneAudienceType($name)
    {
        return $this->find()->findAudienceType($name);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\AudiencetypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AudiencetypeQuery(get_called_class());
    }
}
