<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10.10.2018
 * Time: 19:51
 */

namespace app\controllers;


use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{


    public function actionIndex()
    {
        $model = new Task();
        $model->greeting = 'fghjk';
        $model->sayHello = '...here is "Hello, world"';
        if ($model->validate()) {
            $params = [
                'greeting' => $model->greeting,
                'hello' => $model->sayHello
            ];
        } else {
            $params = [
                'greeting' => $model->getFirstError('greeting'),
                'hello' => $model->getErrors()[0]
            ];

        }

        return $this->render('task', $params);
    }
}