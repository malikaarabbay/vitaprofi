<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('banner', 'Баннеры');



$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '{modelClass}', [
            'modelClass' => Yii::t('banner', 'Добавить баннер'),
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            [
                'attribute'=>'photo',
                'value'=> function($model){ return $model->image;},
                'format' => ['image',['width'=>'50','height'=>'30']],
            ],
//            'link',
            [
                'attribute' => 'is_published',
                'class' => 'yii\grid\DataColumn',
                'label' => 'Опубликован',
                'value' => function ($data) {
                    return Yii::$app->params['published'][$data->is_published];
                },
                'filter' => Yii::$app->params['published']
            ],
            //'sort_index',
            // 'created',
            // 'updated',
            // 'deleted',

            [   'header' => 'Действия',
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>

</div>