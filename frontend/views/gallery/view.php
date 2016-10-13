<?php

$this->title = Yii::t('app', 'Photo Gallery');

$this->params['breadcrumbs'][] = Yii::t('app', 'Photo Gallery');

$this->registerMetaTag(['name'=> 'keywords', 'content' =>  $model->meta_keywords]);
$this->registerMetaTag(['name'=> 'description', 'content' => $model->meta_description]);

?>
<div class="container">
    <div class="cr">
        <div class="title">
            <?= Yii::t('app', 'Photo Gallery') ?>
        </div>
        <ul class="gallery-list" id="wrapper">
            <?= $this->render('_gallery', [
                'model' => $model
            ]) ?>
        </ul>
    </div>
</div>
