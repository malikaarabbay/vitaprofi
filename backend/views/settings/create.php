<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Settings */

$this->title = Yii::t('app', 'Create Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
