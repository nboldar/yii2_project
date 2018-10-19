<?php

namespace app\models;
use app\models\tables\Users;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;



    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        if ($user = Users::findOne(['id' => $id])) {
            return new static([
                'id' => $user->id,
                'username' => $user->username,
                'password' => $user->password,
            ]);
        }
        return  null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

        if ($user = Users::findOne(['username' => $username])) {
            return new static([
                'id' => $user->id,
                'username' => $user->username,
                'password' => $user->password,
            ]);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
//        var_dump($password);exit;
        return \Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}
