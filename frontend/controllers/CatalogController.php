<?php
namespace frontend\controllers;
use common\models\Article;
use common\models\Category;
use common\models\Product;
use common\models\ProductElastic;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\data\Sort;
use common\models\search\ProductFilterSearch;
use common\models\ProductAttribute;
use common\models\Attribute;
use frontend\models\Filter;
use frontend\models\Search;
use Yii;
use common\models\search\ProductSearch;
use yii\web\NotFoundHttpException;
class CatalogController extends \yii\web\Controller {
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }

    public function actionView($slug) {
        $category = $this->findModel($slug);
        $parentCategories = Category::find()->where(['parent_id'=>$category->id, 'is_published' => '1'])->all();
        $current = Category::find()->where(['parent_id'=>$category->id, 'is_published' => '1'])->one();
        $thrdParentCategories = Category::find()->where(['parent_id'=>$current->id, 'is_published' => '1'])->all();
        
        $products = Product::find()->where(['is_published' => '1', 'category_id'=>$category->id])->orderBy('id DESC')->all();
        return $this->render('view', [
            'products' =>  $products,
            'category' =>  $category,
            'parentCategories' =>  $parentCategories,
            'thrdParentCategories' =>  $thrdParentCategories,
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