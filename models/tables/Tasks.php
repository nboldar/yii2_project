<?php

namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\imagine\Image;
use yii\web\UploadedFile;

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
 * @property int $created_at
 * @property int $updated_at
 * @property string $imageSmall
 * @property string $imageBig
 */
class Tasks extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $image;

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
            [['title', 'user_id', 'start', 'finish',], 'required'],
            [['description', 'imageSmall', 'imageBig'], 'string'],
            [['user_id', 'done'], 'integer'],
            [['start', 'finish'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg,png'],

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
            'created_at' => 'Created at',
            'updated_at' => 'Updated at'
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
            'mail' => [
                'class' => 'app\behaviors\MailBehavior',
            ]
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $basename = $this->image->getBaseName() . "." . $this->image->getExtension();
            $filename='@webroot/img/'.$basename;
            $smallFilename='@webroot/img/small/'.$basename;
            $bigImagePath='/img/'.$basename;
            $smallImagePath='/img/small/'.$basename;
            $this->imageBig=$bigImagePath;
            $this->imageSmall=$smallImagePath;
            $this->image->saveAs(Yii::getAlias($filename));
            Image::thumbnail($filename, 100, 80)->save(Yii::getAlias($smallFilename));
            $this->save($runValidation = false);
        }
        return false;
    }
}
