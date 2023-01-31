<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\models\User;
use Yii;

class UserController extends ActiveController
{
    public $modelClass = 'app\resources\User';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['create'], $actions['update']);
        return $actions;
    }

    public function actionUpdate(){
        $body = Yii::$app->request->post();

        $model = User::find()
        ->where('username = :username', [':username' => $body['username']])->one();
        $model->student_id = $body['student_id'];
        $model->save();

        return $model;
    }

    public function actionCreate(){
        $body = Yii::$app->request->post();

        $model = new User();

        $query = $model->getOneUser($body['username']);

        if ($query == false){
            $model->load($body,'');
            $model->save();
        }
        else {
            $model = [
                'wrong_login' => True
            ];
        }

        return $model;
    }

    public function actionIndex(){
        $param = Yii::$app->request->get();

        $model = new User();

        $user_data = explode(" ", $param['auth_string']);

        $query = $model->getOneUser($user_data[0]);
        if ($query['password'] == $user_data[1]){
            $response = [
                'is_loged' => True,
                'is_student' => $query['is_student'],
                'student_id' => $query['student_id'],
                'id' => $query['id']
            ];
            return $response;
        }
        else {
            return False;
        }

        return $model;
    }
}