<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $user_id
 * @property string $start
 * @property string $finish
 * @property int $done
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'user_id', 'start', 'finish'], 'required'],
            [['description'], 'string'],
            [['user_id', 'done'], 'integer'],
            [['start', 'finish'], 'safe'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'user_id' => 'User ID',
            'start' => 'Start',
            'finish' => 'Finish',
            'done' => 'Done',
        ];
    }
}
