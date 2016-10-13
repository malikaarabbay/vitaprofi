<?php

namespace common\models;

use vova07\fileapi\behaviors\UploadBehavior;
use Yii;
use Yii\db\ActiveRecord;

/**
 * This is the model class for table "gg_banner".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $is_published
 * @property integer $sort_index
 * @property integer $created
 * @property integer $updated
 * @property integer $deleted
 */
class Banner extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['title'], 'required'],
            [['is_published', 'sort_index', 'created', 'updated'], 'integer'],
            [['title', 'photo', 'link'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'link' => Yii::t('app', 'Ссылка'),
            'photo' => Yii::t('app', 'Photo'),
            'is_published' => Yii::t('app', 'Is Published'),
            'sort_index' => Yii::t('app', 'Sort Index'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),

        ];
    }

    public function getImage()
    {
        $image =  ($this->photo) ? $this->photo : 'placeholder.png';
        return Yii::getAlias('@frontendWebroot/images/').$image;
    }

    public function getImagePath()
    {
        $image =  ($this->photo) ? $this->photo : 'placeholder.png';
        return '@frontend/web/images/'.$image;
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created', 'updated'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated'],
                ],
            ],
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'photo' => [
                        'path' => '@frontend/web/images',
                        'tempPath' => '@frontend/web/images',
                        'url' => Yii::getAlias('@frontendWebroot/images')
                    ]
                ]
            ],
        ];
    }
}