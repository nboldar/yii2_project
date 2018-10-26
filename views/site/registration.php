<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Users */
/* @var $form ActiveForm */
$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="registration">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>Please fill out the following fields for registration:</p>
        <?php $form = ActiveForm::begin(); ?>
        <?php $form->action = '\\index.php?r=site%2Fsighup' ?>
        <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password_repeat')->passwordInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'sighUp-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div><!-- registration -->
<?php

?>