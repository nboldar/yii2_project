<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $name
 * @property string $ext
 * @property string $ref_path
 * @property int $task_id
 *
 * @property Tasks $task
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'ext', 'ref_path'], 'required'],
            [['task_id'], 'integer'],
            [['name', 'ref_path'], 'string', 'max' => 255],
            [['ext'], 'string', 'max' => 28],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'ext' => Yii::t('app', 'Ext'),
            'ref_path' => Yii::t('app', 'Ref Path'),
            'task_id' => Yii::t('app', 'Task ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'task_id']);
    }
}
