<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Audiencetype;
use Yii;

class AudiencetypeController extends ActiveController
{
    public $modelClass = 'app\resources\Audiencetype';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate(){
        $body = Yii::$app->request->post();

        $model = new Audiencetype();

        $query = $model->getOneAudienceType($body['name']);

        if($query == false){
            $model->load($body,'');
            $model->save();
        }
        else
        {
            $model = $query;
        }

        return $model;
    }

    public function checkDataBase($model, $body)
    {
        return $model->getOneAudienceType($body['name']);
    }
}