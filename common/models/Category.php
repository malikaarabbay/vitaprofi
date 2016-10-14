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
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $title
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
class Category extends \yii\db\ActiveRecord
{
    public $file;

    public static function tableName()
    {
        return '{{%category}}';
    }

    public function rules()
    {
        return [
            [['icon', 'description'], 'string'],
            [['parent_id', 'is_published'], 'integer'],
            [['title_ru', 'title_kz', 'title_en', 'slug'], 'string', 'max' => 255],
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
            'model_name' => Yii::t('app', 'Model Name'),
            'file' => Yii::t('app', 'File'),
            'description' => Yii::t('app', 'Description'),
            'photo' => Yii::t('app', 'Photo'),
            'icon' => Yii::t('app', 'Icon'),
            'parent_id' => Yii::t('app', 'Parent'),
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

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'parent_id']);
    }

    public function getProducts() {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    public function getParent() {
        return $this->hasOne(Category::className(), ['parent_id' => 'id']);
    }

//    public function getProducts() {
//        return $this->hasMany(Product::className(), ['category_id' => 'id']);
//    }

    public function getImage()
    {
        $image =  ($this->photo) ? $this->photo : 'placeholder.png';
        return Yii::getAlias('@frontendWebroot/images').'/'.$image;
    }

    public function getIcon()
    {
        $image =  ($this->icon) ? $this->icon : 'placeholder.png';
        return Yii::getAlias('@frontendWebroot/images').'/'.$image;
    }

    public function getImagePath()
    {
        $image =  ($this->photo) ? $this->photo : 'placeholder.jpg';
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
                    ],
                    'icon' => [
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
