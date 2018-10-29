<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\tables\Users;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php $users = Users::find()->select(['id', 'username'])->all(); ?>
    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map($users, 'id', 'username')) ?>

    <?= $form->field($model, 'start')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'finish')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'done')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
