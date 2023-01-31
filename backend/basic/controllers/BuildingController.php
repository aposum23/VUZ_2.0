<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Building;
use Yii;

class BuildingController extends ActiveController
{
    public $modelClass = 'app\resources\Building';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate(){
        $body = Yii::$app->request->post();

        $model = new BUilding();

        $query = $model->getOneBuilding($body['name']);

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
}