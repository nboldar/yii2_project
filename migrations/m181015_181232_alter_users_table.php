<?php

use yii\db\Migration;

/**
 * Class m181015_181232_alter_users_table
 */
class m181015_181232_alter_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('users', 'login', 'username');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181015_181232_alter_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181015_181232_alter_users_table cannot be reverted.\n";

        return false;
    }
    */
}
