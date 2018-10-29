<?php

use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

?>
<?php foreach ($tasks as $task): ?>
    <div>cerf ,kzlm</div>
    <div class="card">
        <h3>№<?= $task['id'] ?>) <?= $task['title'] ?></h3>
        <p><?= $task['description'] ?></p>
        <p>Responsible for this task user with id <?= $task['user_id'] ?></p>
        <p>Starts at:<?= $task['start'] ?></p>
        <p>Have to be done at:<?= $task['finish'] ?></p>
        <?php if ($task['imageSmall']): ?>

            <img src="<?= $task['imageSmall'] ?>">
            <?php Modal::begin([
                'header' => "<h2>{$task['title']}</h2>",
                'toggleButton' => ['label' => 'увеличить фото'],
                'size' => 'modal-lg',
                'options'=>['style'=>'min-width:700px'],
            ]);

            echo "<img src='{$task['imageBig']}'/>";

            Modal::end(); ?>
        <?php endif; ?>
        <?php if ($task['done'] == 1): ?>
            <p>The task is done</p>
        <?php else: ?>
            <p>The task in process</p>
        <?php endif; ?>
        <?php $form = ActiveForm::begin($config = ['action' => 'task/upload']);

        echo $form->field($model, 'image')->fileInput();;
        echo \yii\helpers\Html::submitButton($content = Yii::t('app', 'upload'), $options =
            [
                'name' => 'task_id',
                'value' => $task['id'],

            ]);
        ActiveForm::end() ?>

    </div>
<?php endforeach; ?>
