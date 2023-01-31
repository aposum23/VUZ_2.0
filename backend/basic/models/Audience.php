<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%audience}}".
 *
 * @property int $id
 * @property int $parent_subdivision
 * @property int $type
 *
 * @property Subdivision $parentSubdivision
 * @property Audiencetype $type0
 */
class Audience extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%audience}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_subdivision', 'type'], 'required'],
            [['parent_subdivision', 'type', 'anumber', 'seats_count', 'floor'], 'integer'],
            [['length', 'width'], 'number'],
            [['parent_subdivision'], 'exist', 'skipOnError' => true, 'targetClass' => Subdivision::class, 'targetAttribute' => ['parent_subdivision' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => Audiencetype::class, 'targetAttribute' => ['type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_subdivision' => 'Parent Subdivision',
            'type' => 'Type',
            'anumber' => 'Audience number',
            'seats_count' => 'Seats count',
            'floor' => 'Floor',
            'length' => 'length',
            'width' => 'Width'
        ];
    }

    /**
     * Gets query for [[ParentSubdivision]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\SubdivisionQuery
     */
    public function getSubdivision()
    {
        return $this->hasOne(Subdivision::class, ['id' => 'parent_subdivision']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AudiencetypeQuery
     */
    public function getAudienceType()
    {
        return $this->hasOne(Audiencetype::class, ['id' => 'type']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\BuildingQuery
     */
    public function getBuilding()
    {
        return $this->find()->buildings($this->parent_subdivision);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSquare()
    {
        $square = $this->length * $this->width;
        return $square;
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AudienceQuery
     */
    public function getOneAudience($number)
    {
        return $this->find()->findAudience($number);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\AudienceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AudienceQuery(get_called_class());
    }
}
