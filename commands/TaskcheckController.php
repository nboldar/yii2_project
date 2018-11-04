<?php

namespace app\commands;


use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\console\Controller;
use Yii;

class TaskcheckController extends Controller
{
    /**
     * проверка заданий на истечение сроков и отправка почты-напоминания пользователям
     */

    public function actionIndex()
    {

        $tomorrow = date('Y-n-d', strtotime("+1 day"));
        $tasks = Tasks::find()->where(['finish' => $tomorrow])->asArray()->all();
        $userIds = [];
        foreach ($tasks as $task) {
            if (!in_array($task['user_id'], $userIds)) {
                array_push($userIds, $task['user_id']);
            }
        }
        $users=Users::findAll($userIds);
        foreach ($users as $user) {
            $userEmail = $user->getAttribute('email');
            $textHtmlBody = "<h1>Уважаемый {$user->getAttribute('login')}! </h1>"
                . "<p>Сроки по следующим задачам: </p>";
            $i = 1;
            foreach ($tasks as $task) {
                if ($user->getAttribute('id') == $task['user_id']) {
                    $textHtmlBody .= "<p>{$i}) {$task['title']};</p>";
                    ++$i;
                }

            }
            $textHtmlBody .= "<p> заканчиваются завтра. Поторопитесь!</p>";
            Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setTo($userEmail)
                ->setSubject('Сроки по задачам выходят')
                ->setHtmlBody($textHtmlBody)
                ->send();
        }

    }

}
