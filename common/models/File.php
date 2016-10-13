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
 * This is the model class for table "{{%file}}".
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $title_kz
 * @property string $title_en
 * @property string $file_ru
 * @property string $file_kz
 * @property string $file_en
 * @property integer $is_published
 * @property integer $created
 * @property integer $updated
 */
class File extends \yii\db\ActiveRecord
{
    public $file_rus;
    public $file_kaz;
    public $file_eng;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%file}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_published', 'created', 'updated', 'category_id'], 'integer'],
            [['title_ru', 'title_kz', 'title_en', 'file_ru', 'file_kz', 'file_en'], 'string', 'max' => 255],
            [['file_rus', 'file_kaz', 'file_eng'], 'file']
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
            'file_ru' => Yii::t('app', 'File RU'),
            'file_kz' => Yii::t('app', 'File KZ'),
            'file_en' => Yii::t('app', 'File EN'),
            'is_published' => Yii::t('app', 'Is Published'),
            'category_id' => Yii::t('app', 'Category ID'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    public function getAttachmentFileLinkRu(){
        $attachment_ru =  ($this->file_ru) ? $this->file_ru : 'placeholder.jpg';
        return Yii::getAlias('@frontendWebroot/docs').'/'.$attachment_ru;
    }

    public function getAttachmentFileLinkKz(){
        $attachment_kz =  ($this->file_kz) ? $this->file_kz : 'placeholder.jpg';
        return Yii::getAlias('@frontendWebroot/docs').'/'.$attachment_kz;
    }

    public function getAttachmentFileLinkEn(){
        $attachment_en =  ($this->file_en) ? $this->file_en : 'placeholder.jpg';
        return Yii::getAlias('@frontendWebroot/docs').'/'.$attachment_en;
    }

    public function saveFileRu()
    {
        $this->file_rus = UploadedFile::getInstance($this, 'file_rus');
//        var_dump($this->file);die();
        if ($this->file_rus && $this->validate()) {
            $filename = uniqid() . '.' . $this->file_rus->extension;
            $this->file_rus->saveAs(Yii::getAlias('@frontend/web/docs/'. $filename));
            $this->file_ru = $filename;
            $this->save();
            //}
        }
    }

    public function saveFileKz()
    {
        $this->file_kaz = UploadedFile::getInstance($this, 'file_kaz');
//        var_dump($this->file);die();
        if ($this->file_kaz && $this->validate()) {
            $filename = uniqid() . '.' . $this->file_kaz->extension;
            $this->file_kaz->saveAs(Yii::getAlias('@frontend/web/docs/'. $filename));
            $this->file_kz = $filename;
            $this->save();
            //}
        }
    }

    public function saveFileEn()
    {
        $this->file_eng = UploadedFile::getInstance($this, 'file_eng');
//        var_dump($this->file);die();
        if ($this->file_eng && $this->validate()) {
            $filename = uniqid() . '.' . $this->file_eng->extension;
            $this->file_eng->saveAs(Yii::getAlias('@frontend/web/docs/'. $filename));
            $this->file_en = $filename;
            $this->save();
            //}
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
        ];

    }
}
