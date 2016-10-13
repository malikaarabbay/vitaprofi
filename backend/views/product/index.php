<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function($data) {
                    return Html::img($data->image,['width'=>150]);
                },
            ],
            [
                'attribute' => 'category_id',
                'class' => 'yii\grid\DataColumn',
                'label' => 'Категория',
                'value' => function ($data) {
                    return ($data->category) ? $data->category->title_ru : '-';
                },
                'filter' => ArrayHelper::map(Category::find()->all(), 'id', 'title_ru')
            ],
            'title_ru',
            [
                'attribute' => 'is_new',
                'class' => 'yii\grid\DataColumn',
                'label' => 'Новинка',
                'value' => function ($data) {
                    return ($data->is_published) ? Yii::$app->params['newProduct'][$data->is_new] : '';
                },
                'filter' => Yii::$app->params['newProduct']
            ],
             'created:datetime',

            [
                'attribute' => 'is_published',
                'class' => 'yii\grid\DataColumn',
                'label' => 'Опубликован',
                'value' => function ($data) {
                    return ($data->is_published) ? Yii::$app->params['published'][$data->is_published] : '';
                },
                'filter' => Yii::$app->params['published']
            ],
            [
                'header' => 'Действия',
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>
</div>
