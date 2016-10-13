<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Review */

$this->title = Yii::t('review', 'Create Review');
$this->params['breadcrumbs'][] = ['label' => Yii::t('review', 'Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
