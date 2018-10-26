<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 25.10.2018
 * Time: 21:24
 */

namespace app\models;


use app\models\tables\Users;

class RegistrationForm extends Users
{
    public $password_repeat;

    public function rules()
    {
        return [
            [['password', 'email', 'username'], 'required'],
            [ 'username', 'unique','targetClass'=>User::className(),'massage'=>'User with this name already exists!'],
            [ 'email', 'unique','targetClass'=>User::className(),'massage'=>'This email is in usage by some user!'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
            ['email', 'email'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'password_repeat'=>'Password repeat'
        ];
    }
}