<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Product',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-update">


    <?= $this->render('_form', [
        'model' => $model,
        'image_tab' => $image_tab,
        'categories' => $categories,
    ]) ?>

    <?php Modal::begin([
        'id' => 'updateImageTitleModal',
        'header' => 'Название изображении',
        'size' => 'modal-md',
    ]); ?>


</div>
