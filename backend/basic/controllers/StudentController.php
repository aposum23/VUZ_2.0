<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Student;
use Yii;

class StudentController extends ActiveController
{
    public $modelClass = 'app\models\Student';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate(){
        $body = Yii::$app->request->post();

        $model = Student::find()
        ->where('last_name = :last_name AND first_name = :first_name AND midle_name = :midle_name
        AND birth_date = :birth_date', [':last_name' => $body['last_name'], ':first_name' => $body['first_name'],
        ':midle_name' => $body['midle_name'], ':birth_date' => $body['birth_date']])->one();

        $model->last_name = $body['last_name'];
        $model->first_name = $body['first_name'];
        $model->midle_name = $body['midle_name'];
        $model->birth_date = $body['birth_date'];
        $model->place_of_residence = $body['place_of_residence'];
        $model->residential_address = $body['residential_address'];
        $model->phone_number = $body['phone_number'];
        $model->email = $body['email'];
        $model->save();

        return $model;
    }
}