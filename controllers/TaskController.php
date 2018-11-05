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
use yii\web\UploadedFile;

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
        $model = new Tasks();
        $tasks =Tasks::find()->all();

//            Tasks::find()
//            ->where(['between', 'start', $firstDayOfMonth, $lastDayOfMonth])
//            ->asArray()
//            ->all();
//        var_dump($tasks);exit;
        return $this->render('task', ['tasks' => $tasks, 'model' => $model]);
    }


    public function actionUpload()
    {
        if (\Yii::$app->request->isPost) {
            $id = \Yii::$app->request->getBodyParam('task_id');
            $model = Tasks::findOne(['id' => $id]);
            $model->image=UploadedFile::getInstance($model, 'image');
            $model->upload();
        }

        return $this->redirect(\Yii::$app->request->getReferrer());
    }


}