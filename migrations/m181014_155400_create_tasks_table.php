<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181014_155400_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(100)->notNull(),
            'description'=>$this->text(),
            'user_id'=>$this->integer()->notNull(),
            'start'=>$this->date()->notNull(),
            'finish'=>$this->date()->notNull(),
            'done'=>$this->integer()->notNull()->defaultValue('0')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
