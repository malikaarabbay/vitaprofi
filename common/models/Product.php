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
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $title_kz
 * @property string $title_en
 * @property string $description_ru
 * @property string $description_kz
 * @property string $description_en
 * @property integer $sku
 * @property string $photo
 * @property string $attachment
 * @property string $slug
 * @property integer $is_published
 * @property integer $created
 * @property integer $updated
 */
class Product extends \yii\db\ActiveRecord
{
    public $file_attach;
    public $file;
    const IMAGE_DIR = 'product';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description_ru', 'description_kz', 'description_en', 'meta_keywords', 'meta_description'], 'string'],
            [['sku', 'is_published', 'created', 'updated', 'category_id', 'parent_id', 'is_new'], 'integer'],
            [['title_ru', 'title_kz', 'title_en', 'photo', 'attachment', 'slug'], 'string', 'max' => 255],
            [['title_ru', 'title_kz', 'title_en'], 'required'],
            [['file_attach', 'file'], 'file', 'maxFiles' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_ru' => Yii::t('app', 'Title RU'),
            'title_kz' => Yii::t('app', 'Title KZ'),
            'title_en' => Yii::t('app', 'Title EN'),
            'description_ru' => Yii::t('app', 'Description RU'),
            'description_kz' => Yii::t('app', 'Description KZ'),
            'description_en' => Yii::t('app', 'Description EN'),
            'category_id' => Yii::t('app', 'Category ID'),
            'parent_id' => 'Родительский товар',
            'sku' => Yii::t('app', 'Sku'),
            'photo' => Yii::t('app', 'Photo'),
            'attachment' => Yii::t('app', 'Attachment'),
            'file' => Yii::t('app', 'File'),
            'is_new' => Yii::t('app', 'Is ew'),
            'slug' => Yii::t('app', 'Slug'),
            'is_published' => Yii::t('app', 'Is Published'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'meta_description' => Yii::t('app', 'Meta Description'),
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getParent() {
        return $this->hasOne(Category::className(), ['parent_id' => 'id']);
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

    public function getAttachmentFileLink(){
        $attachment_file =  ($this->attachment) ? $this->attachment : 'placeholder.jpg';
        return Yii::getAlias('@frontendWebroot/docs').'/'.$attachment_file;
    }

    public function saveFile()
    {
        $this->file_attach = UploadedFile::getInstance($this, 'file_attach');
//        var_dump($this->file);die();
        if ($this->file_attach && $this->validate()) {
            $filename = uniqid() . '.' . $this->file_attach->extension;
            $this->file_attach->saveAs(Yii::getAlias('@frontend/web/docs/'. $filename));
            $this->attachment = $filename;
            $this->save();
            //}
        }
    }

    public function saveImages(){

        $this->file = UploadedFile::getInstances($this, 'file');

        if ($this->file && $this->validate()) {
            foreach ($this->file as $file) {
                $filename = uniqid() . '.' . $file->extension;

                $file->saveAs(Yii::getAlias('@frontend/web/images/'. $filename));

                $image = new Image;
                $image->filename = $filename;
                $image->model_name = 'product';
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
        ];

    }
    
}
