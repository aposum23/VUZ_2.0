<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Audience]].
 *
 * @see \app\models\Audience
 */
class AudienceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Audience[]|array
     */
    public function findAudience($number)
    {
        $query = (new \yii\db\Query)
        ->select(['id', 'anumber'])
        ->from(['audience'])
        ->where('anumber = :number', [':number'=>$number])->one();
        
        return $query;
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Audience[]|array
     */
    public function buildings($subdivision)
    {
        $query = (new \yii\db\Query)
        ->select(['building.id','building.name'])
        ->from(['building'])
        ->leftJoin('subdivision', 'subdivision.building_id = building.id')
        ->where('subdivision.id = :subdivision', [':subdivision' => $subdivision])->one();
        
        return $query;
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Audience[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Audience|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
