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
class ProductController extends \yii\web\Controller {
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }

    public function actionView($slug) {
        $model = $this->findModel($slug);
        $relatedProducts = Product::find()->where(['is_published' => '1', 'parent_id'=>$model->id])->orderBy('id DESC')->all();
        return $this->render('view', [
            'model' => $model,
            'relatedProducts' =>  $relatedProducts,
        ]);
    }
    protected function findModel($slug)
    {
        if (($model = Product::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}