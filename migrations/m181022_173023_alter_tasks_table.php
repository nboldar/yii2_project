<?php

use yii\db\Migration;

/**
 * Class m181022_173023_alter_tasks_table
 */
class m181022_173023_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks', 'created_at', 'timestamp');
        $this->addColumn('tasks', 'updated_at', 'timestamp');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181022_173023_alter_tasks_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181022_173023_alter_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}
