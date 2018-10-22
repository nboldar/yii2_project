<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 22.10.2018
 * Time: 22:22
 */

namespace app\behaviors;

use app\models\tables\Users;
use  Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class MailBehavior extends Behavior
{


    public function sendMail()
    {
        $emailTo=Users::findOne($this->owner->user_id)->email;
        $emailFrom=Yii::$app->params['adminEmail'];
        $title=$this->owner->title;
        $body=$this->owner->description;

        if ($this->owner->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($emailTo)
                ->setFrom($emailFrom)
                ->setSubject($title)
                ->setTextBody($body)
                ->send();

            return true;
        }
        return false;
    }
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT=>'sendMail'
        ];
    }

}