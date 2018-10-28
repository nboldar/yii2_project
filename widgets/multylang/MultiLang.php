<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 28.10.2018
 * Time: 22:34
 */
namespace app\widgets\multylang;
use yii\helpers\Html;

class MultiLang extends \yii\bootstrap\Widget
{
    public $cssClass;
    public function init(){}

    public function run() {

        return $this->render('view', [
            'cssClass' => $this->cssClass,
        ]);

    }
}