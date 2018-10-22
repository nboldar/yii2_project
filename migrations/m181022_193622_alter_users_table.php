<?php

use yii\db\Migration;

/**
 * Class m181022_193622_alter_users_table
 */
class m181022_193622_alter_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'email', 'varchar(255)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181022_193622_alter_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181022_193622_alter_users_table cannot be reverted.\n";

        return false;
    }
    */
}
