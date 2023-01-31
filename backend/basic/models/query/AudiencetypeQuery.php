<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Audiencetype]].
 *
 * @see \app\models\Audiencetype
 */
class AudiencetypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Audiencetype[]|array
     */
    public function findAudienceType($name)
    {
        $query = (new \yii\db\Query)
        ->select(['id', 'name'])
        ->from(['audiencetype'])
        ->where('name = :name', [':name'=>$name])->one();
        
        return $query;
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Audiencetype[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Audiencetype|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
