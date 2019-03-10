<?php

use yii\db\Migration;

/**
 * Handles the creation of table `files`.
 */
class m181111_154457_create_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('files', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(255)->notNull(),
            'ext'=>$this->string(28)->notNull(),
            'ref_path'=>$this->string(255)->notNull(),
            'task_id'=>$this->integer(),            
        ]);
        $this->addForeignKey('fk_task_id', 'files', 'task_id', 'tasks', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('files');
    }
}
