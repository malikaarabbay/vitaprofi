<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\File */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'File',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Files'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="file-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
