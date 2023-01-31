<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Building]].
 *
 * @see \app\models\Building
 */
class BuildingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Building[]|array
     */
    public function findBuilding($name)
    {
        $query = (new \yii\db\Query)
        ->select(['id', 'name'])
        ->from(['building'])
        ->where('name = :name', [':name'=>$name])->one();
        
        return $query;
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Building[]|array
     */
    public function nameEqual($name)
    {
        $query = (new \yii\db\Query)
        ->select(['id', 'name'])
        ->from(['building'])
        ->where('name LIKE :name', [':name' => $name]);

        return $query;
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Building[]|array
     */
    public function audiences($id)
    {
        $query = (new \yii\db\Query)
        ->select(['aud.anumber as anumber', 'subdivision.name as subname'])
        ->from(['subdivision'])
        ->leftJoin('audience as aud', 'aud.parent_subdivision = subdivision.id')
        ->where('subdivision.building_id = :id', [':id' => $id])->all();

        return $query;
    }

     /**
     * {@inheritdoc}
     * @return \app\models\Building[]|array
     */
    public function audienceTypeCount($id, $type)
    {
        $query = (new \yii\db\Query)
        ->select(['aud.id'])
        ->from(['subdivision'])
        ->leftJoin('audience as aud', 'aud.parent_subdivision = subdivision.id')
        ->leftJoin('audiencetype as type', 'type.id = aud.type')
        ->where('subdivision.building_id = :id AND type.name = :type',
            [':id' => $id, ':type' => $type])->count();

        return $query;
    }
    
    /**
     * {@inheritdoc}
     * @return \app\models\Building[]|array
     */
    public function audienceCount($id)
    {
        $query = (new \yii\db\Query)
        ->select(['aud.id'])
        ->from(['subdivision'])
        ->leftJoin('audience as aud', 'aud.parent_subdivision = subdivision.id')
        ->where('subdivision.building_id = :id', [':id' => $id])->count();

        return $query;
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Building[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Building|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
