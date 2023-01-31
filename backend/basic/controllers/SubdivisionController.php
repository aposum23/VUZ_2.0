<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Subdivision;
use Yii;

class SubdivisionController extends ActiveController
{
    public $modelClass = 'app\resources\Subdivision';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate(){
        $body = Yii::$app->request->post();

        $model = new Subdivision();

        $query = $model->getOneSubdivision($body['name']);

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