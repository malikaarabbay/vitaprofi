<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use Yii\db\ActiveRecord;
use vova07\fileapi\behaviors\UploadBehavior;
use yii\behaviors\SluggableBehavior;
use yii\web\UploadedFile;
use himiklab\sortablegrid\SortableGridBehavior;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $anounce
 * @property string $description
 * @property string $photo
 * @property integer $status
 * @property integer $created
 * @property integer $updated
 * @property integer $is_published
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $slug
 */
class News extends \yii\db\ActiveRecord
{
    public $file;
    const IMAGE_DIR = 'news';

    public static function tableName()
    {
        return '{{%news}}';
    }

    public function rules()
    {
        return [
            [['anounce', 'description_ru', 'description_kz', 'description_en', 'meta_keywords', 'meta_description'], 'string'],
            [['category_id', 'created', 'updated', 'is_published', 'created_user_id', 'updated_user_id', 'sort_index'], 'integer'],
            [['title_ru', 'title_kz', 'title_en', 'photo', 'slug'], 'string', 'max' => 255],
            [['title_ru', 'title_kz', 'title_en'], 'required'],
            [['file'], 'file', 'maxFiles' => 10]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_ru' => Yii::t('app', 'Title RU'),
            'title_kz' => Yii::t('app', 'Title KZ'),
            'title_en' => Yii::t('app', 'Title EN'),
            'file' => Yii::t('app', 'File'),
            'category_id' => Yii::t('app', 'Category'),
            'anounce' => Yii::t('app', 'Anounce'),
            'description_ru' => Yii::t('app', 'Description RU'),
            'description_kz' => Yii::t('app', 'Description KZ'),
            'description_en' => Yii::t('app', 'Description EN'),
            'photo' => Yii::t('app', 'Photo'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'sort_index' => Yii::t('app', 'Sort Index'),
            'is_published' => Yii::t('app', 'Is Published'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'slug' => Yii::t('app', 'Slug'),
            'created_user_id' => Yii::t('app', 'Created User Id'),
            'updated_user_id' => Yii::t('app', 'Updated User Id'),
        ];
    }

    public function getImage()
    {
        $image =  ($this->photo) ? $this->photo : 'placeholder.png';
        return Yii::getAlias('@frontendWebroot/images').'/'.$image;
    }

    public function getImages()
    {
        return Image::find()->where(['model_name' => $this::IMAGE_DIR, 'item_id' => $this->id])->all();
    }

    public function getImagePath()
    {
        $image =  ($this->photo) ? $this->photo : 'placeholder.jpg';
        return '@frontend/web/images/'.$image;
    }


    public function saveImages(){

        $this->file = UploadedFile::getInstances($this, 'file');

        if ($this->file && $this->validate()) {
            foreach ($this->file as $file) {
                $filename = uniqid() . '.' . $file->extension;

                $file->saveAs(Yii::getAlias('@frontend/web/images/'. $filename));

                $image = new Image;
                $image->filename = $filename;
                $image->model_name = 'news';
                $image->item_id = $this->id;
                $image->save();
            }
        }
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
                    ],
                ]
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title_ru',
                'slugAttribute' => 'slug'
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_user_id',
                'updatedByAttribute' => 'updated_user_id',
            ],
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'sort_index'
            ],
        ];

    }
}
