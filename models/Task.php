<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10.10.2018
 * Time: 20:35
 */

namespace app\models;

use yii\base\Model;

class Task extends Model
{
    public $greeting;
    public $sayHello;


    public function rules()
    {
        return [
            [['greeting','sayHello'], 'app\\components\\validators\\MyValidator'],
        ];
    }


}