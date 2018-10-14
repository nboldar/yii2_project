<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10.10.2018
 * Time: 19:51
 */

namespace app\controllers;


use app\models\tables\Tasks;
use yii\web\Controller;

class TaskController extends Controller
{


    public function actionIndex()
    {
        $tasks = Tasks::find()->asArray()->all();
        return $this->render('task', ['tasks' => $tasks]);
    }
}