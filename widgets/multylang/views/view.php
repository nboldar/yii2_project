<?php
namespace app\widgets\multylang\MultiLang;
use yii\helpers\Html;
use Yii;
?>

<li class="btn-group <?= $cssClass; ?>">
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="uppercase"><?= \Yii::t('app', 'language') ?></span>
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li class="item-lang">
            <?= Html::a('English', array_merge(
                \Yii::$app->request->get(),
                [\Yii::$app->controller->route, 'language' => 'en']
            )); ?>
        </li>
        <li class="item-lang">
            <?= Html::a('Русский', array_merge(
                \Yii::$app->request->get(),
                [\Yii::$app->controller->route, 'language' => 'ru']
            )); ?>
        </li>
    </ul>
</li>