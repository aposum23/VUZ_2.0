<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%building}}".
 *
 * @property int $id
 * @property string $name
 *
 * @property Subdivision[] $subdivisions
 */
class Building extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%building}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 150],
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
     * Gets query for [[Subdivisions]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\SubdivisionQuery
     */
    public function getSubdivisions()
    {
        return $this->hasMany(Subdivision::class, ['building_id' => 'id']);
    }

    /**
     * Gets query for [[Subdivisions]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AudienceQuery
     */
    public function getAudiences()
    {
        return $this->find()->audiences($this->id);
    }

    /**
     * Gets query for [[Subdivisions]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\SubdivisionQuery
     */
    public function getAudienceCount()
    {
        return $this->find()->audienceCount($this->id);
    }

    /**
     * Gets query for [[Subdivisions]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\SubdivisionQuery
     */
    public function getLectionCount()
    {
        return $this->find()->audienceTypeCount($this->id, 'Лекционная');
    }

    /**
     * Gets query for [[Subdivisions]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\SubdivisionQuery
     */
    public function getPracticCount()
    {
        return $this->find()->audienceTypeCount($this->id, 'Практическая');
    }

    /**
     * Gets query for [[Subdivisions]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\SubdivisionQuery
     */
    public function getComputerCount()
    {
        return $this->find()->audienceTypeCount($this->id, 'Компьютерная');
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\BuildingQuery
     */
    public function getOneBuilding($name)
    {
        return $this->find()->findBuilding($name);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\BuildingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\BuildingQuery(get_called_class());
    }
}
