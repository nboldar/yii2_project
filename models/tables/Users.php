<?php

namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $passsword_repeat
 * @property string $authKey
 * @property string $accessToken
 * @property int $created_at
 * @property int $updated_at
 * @property string $email
 */

class Users extends \yii\db\ActiveRecord
{
    public $password_repeat;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password',], 'required'],
            [['username', 'password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['password_repeat'], 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"],
            [['username','email'], 'unique'],
            [['email'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'email'=>'Email',
            'password_repeat'=>'Password repeat'
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function beforeSave($insert)
    {
        $password = $this->getAttribute('password');
        $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
        $this->setAttribute('password', $hash);
        return parent::beforeSave($insert);
    }
}
