<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use vova07\fileapi\behaviors\UploadBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%review}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $model_id
 * @property integer $is_published
 * @property string $review
 * @property integer $created
 * @property integer $updated
 * @property integer $deleted
 */
class Review extends \yii\db\ActiveRecord
{


    public static function tableName()
    {
        return '{{%review}}';
    }

    public function rules()
    {
        return [
            [['is_published', 'created', 'updated'], 'integer'],
            [['review'], 'string'],
            [['title', 'photo'], 'string', 'max' => 255],
            [['review', 'title', 'photo', 'fio'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'fio' => Yii::t('app', 'Fio'),
            'photo' => Yii::t('app', 'Photo'),
            'is_published' => Yii::t('app', 'Is Published'),
            'review' => Yii::t('app', 'Review'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
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
        ];
    }

    public function getImage()
    {
        $image =  ($this->photo) ? $this->photo : 'placeholder.png';
        return Yii::getAlias('@frontendWebroot/images').'/'.$image;
    }

    public function getImagePath()
    {
        $image =  ($this->photo) ? $this->photo : 'placeholder.jpg';
        return '@frontend/web/images/'.$image;
    }


//    public function saveProductRating(){
//        $product = Product::findOne($this->model_id);
//
//        $reviews = Review::find()->where(['model' => 'product', 'model_id' => $this->model_id])->all();
//        $ratings = ArrayHelper::getColumn($reviews, 'rating');
//
//        $result = 0;
//        foreach($ratings as $rating){
//            $result += $rating;
//        }
//        if(count($ratings) > 0) {
//            $product->rating = ($result/count($ratings));
//            $product->save();
//        }
//    }

}
