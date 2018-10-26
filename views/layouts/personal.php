<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 26.10.2018
 * Time: 14:07
 */

use yii\helpers\Html;


$this->title = 'My personal page';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="site-personal">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Hello ! Here is your tasks:</p>
    <div>
        <?= $content ?>
        <!--        --><?php //$this->render('@app/views/task/task.php',['tasks'=>$tasks]) ?>
    </div>
</div>
<?php $this->endContent(); ?>

