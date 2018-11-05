<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;

?>

<div class="admin-default-index">

    <?php
    if (Yii::$app->user->can('adminAll')) {
        echo Html::beginForm($action = '#', $method = 'get');
        echo Html::submitButton($content = 'Users', $options = [
            'formaction' => 'admin/users'
        ]);

        echo Html::submitButton($content = 'Tasks', $options = [
            'formaction' => 'admin/tasks'
        ]);
        Html::endForm();
    } else {
        echo "<h1>У васнет прав для просмотра этой страницы!</h1>";
    }
    ?>
</div>
