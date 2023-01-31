<?php
namespace app\controllers;

use yii\rest\ActiveController;
use Yii;
use app\models\Audience;

class AudienceController extends ActiveController
{
    public $modelClass = 'app\resources\Audience';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate(){
        $body = Yii::$app->request->post();

        $model = new Audience();

        $query = $model->getOneAudience($body['anumber']);

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