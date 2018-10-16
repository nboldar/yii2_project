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
        $month = date('n');
        $year = date('Y');
        $firstDay = '01';
        $lastDay = date('t');
        $firstDayOfMonth = $year . '-' . $month . '-' . $firstDay;
        $lastDayOfMonth = $year . '-' . $month . '-' . $lastDay;

        $tasks = Tasks::find()
            ->where(['between', 'start', $firstDayOfMonth, $lastDayOfMonth])
            ->asArray()
            ->all();
        return $this->render('task', ['tasks' => $tasks]);
    }


}