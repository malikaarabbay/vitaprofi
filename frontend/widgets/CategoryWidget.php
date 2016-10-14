<?php

namespace frontend\widgets;

use common\models\Category;
use yii\base\Widget;
use yii\web\NotFoundHttpException;
class CategoryWidget extends Widget
{

    public function init($slug)
    {
        parent::init();
        $category = $this->findModel($slug);
        if($category->id == 1){
            $parentCategories = Category::find()->where(['parent_id'=>1, 'is_published' => '1'])->all();
        } elseif ($category->id == 2){
            $parentCategories = Category::find()->where(['parent_id'=>2, 'is_published' => '1'])->all();
        } elseif ($category->id == 3){
            $parentCategories = Category::find()->where(['parent_id'=>3, 'is_published' => '1'])->all();
        } elseif ($category->id == 4){
            $parentCategories = Category::find()->where(['parent_id'=>4, 'is_published' => '1'])->all();
        }

        echo $this->render('category', [
            'parentCategories' => $parentCategories,
        ]);

    }

    protected function findModel($slug)
    {
        if (($model = Category::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
