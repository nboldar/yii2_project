<?php //var_dump($tasks); exit;?>
<?php foreach ($tasks as $task): ?>
<div>cerf ,kzlm</div>
    <div class="card">
        <h3>№<?= $task['id'] ?>) <?= $task['title'] ?></h3>
        <p><?= $task['description'] ?></p>
        <p>Responsible for this task user with id <?= $task['user_id'] ?></p>
        <p>Starts at:<?= $task['start'] ?></p>
        <p>Have to be done at:<?= $task['finish'] ?></p>
        <?php if ($task['done'] == 1): ?>
            <p>The task is done</p>
        <?php else: ?>
            <p>The task in process</p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
