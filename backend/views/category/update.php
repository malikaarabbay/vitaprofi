<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = Yii::t('app', 'Update Category') . ': ' . $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title_ru, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="example-update">

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>
