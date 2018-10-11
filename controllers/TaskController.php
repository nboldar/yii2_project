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
        $model->greeting = 'Congratulations!!!!';
        $model->sayHello = 'hello world';
        $model->validate('greeting') ? $params['greeting'] = $model->greeting
            : $params['greeting'] = $model->getFirstError('greeting');
        $model->validate('sayHello') ? $params['hello'] = $model->sayHello
            : $params['hello'] = $model->getFirstError('sayHello');

        return $this->render('task', $params);
    }
}