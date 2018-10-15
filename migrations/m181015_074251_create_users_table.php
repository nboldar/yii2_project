<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181015_074251_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull()->unique(),
            'password' => $this->string(255)->notNull(),
            'authKey' => $this->string(255)->notNull(),
            'accessToken' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
