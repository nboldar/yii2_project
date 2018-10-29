<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="admin-default-index">

    <?php
    echo Html::beginForm($action = '#', $method = 'get');
    echo Html::submitButton($content = 'Users', $options = [
        'formaction' => 'admin/users'
    ]);

    echo Html::submitButton($content = 'Tasks',$options = [
        'formaction' => 'admin/tasks'
    ]);
    Html::endForm();
    ?>
</div>
