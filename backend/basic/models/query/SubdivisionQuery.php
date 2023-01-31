<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Subdivision]].
 *
 * @see \app\models\Subdivision
 */
class SubdivisionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Subdivision[]|array
     */
    public function findSubdivision($name)
    {
        $query = (new \yii\db\Query)
        ->select(['id', 'name'])
        ->from(['subdivision'])
        ->where('name = :name', [':name'=>$name])->one();
        
        return $query;
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Subdivision[]|array
     */
    public function audiences($building)
    {
        $query = (new \yii\db\Query)
        ->select(['audience.anumber as anumber'])
        ->from(['audience'])
        ->leftJoin('subdivision', 'subdivision.id = audience.parent_subdivision')
        ->where('subdivision.building_id = :building', [':building' => $building])->all();
        
        return $query;
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Subdivision[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Subdivision|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
