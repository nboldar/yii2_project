<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10.10.2018
 * Time: 19:51
 */

namespace app\controllers;


use app\models\tables\Tasks;
use app\models\User;
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
        $id=\Yii::$app->user->getId();

        $tasks = Tasks::find()
            ->where(['between', 'start', $firstDayOfMonth, $lastDayOfMonth])
            ->andWhere(['user_id'=>$id])
            ->asArray()
            ->all();
        return $this->render('task', ['tasks' => $tasks]);
    }


}