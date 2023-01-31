<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%subdivision}}".
 *
 * @property int $id
 * @property string $name
 * @property int $building_id
 *
 * @property Audience[] $audiences
 * @property Building $building
 */
class Subdivision extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subdivision}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'building_id'], 'required'],
            [['building_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['building_id'], 'exist', 'skipOnError' => true, 'targetClass' => Building::class, 'targetAttribute' => ['building_id' => 'id']],
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
            'building_id' => 'Building ID',
            'audiences' => 'Audiences',
        ];
    }

    /**
     * Gets query for [[Audiences]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AudienceQuery
     */
    public function getAudiences()
    {
        return $this->hasMany(Audience::class, ['parent_subdivision' => 'id']);
    }

    /**
     * Gets query for [[Building]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\BuildingQuery
     */
    public function getBuilding()
    {
        return $this->hasOne(Building::class, ['id' => 'building_id']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\SubdivisionQuery
     */
    public function getOneSubdivision($name)
    {
        return $this->find()->findSubdivision($name);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\SubdivisionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\SubdivisionQuery(get_called_class());
    }
}
