<?php

use yii\db\Migration;

/**
 * Class m181029_171739_alter_tasks_table
 */
class m181029_171739_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks', 'imageSmall', 'varchar(255)');
        $this->addColumn('tasks', 'imageBig', 'varchar(255)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181029_171739_alter_tasks_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181029_171739_alter_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}
