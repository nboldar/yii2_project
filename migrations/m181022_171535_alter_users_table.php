<?php

use yii\db\Migration;

/**
 * Class m181022_171535_alter_users_table
 */
class m181022_171535_alter_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'created_at', 'int(11)');
        $this->addColumn('users', 'updated_at', 'int(11)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181022_171535_alter_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181022_171535_alter_users_table cannot be reverted.\n";

        return false;
    }
    */
}
