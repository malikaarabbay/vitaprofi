<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use vova07\fileapi\Widget as FileAPI;
use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Url;
use common\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\File */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Русский</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Казахский</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">English</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">

            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'file_rus',['inputOptions' => ['class' => 'inputfile ']])->fileInput(['multiple' => false]) ?>

            <a class="btn btn-success" style="margin-bottom: 20px" href="<?= $model->attachmentFileLinkRu ?>">Cкачать прикрепленный файл (<?= $model->file_ru ?>)</a>

        </div>
        <div role="tabpanel" class="tab-pane" id="profile">

            <?= $form->field($model, 'title_kz')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'file_kaz',['inputOptions' => ['class' => 'inputfile ']])->fileInput(['multiple' => false]) ?>

            <a class="btn btn-success" style="margin-bottom: 20px" href="<?= $model->attachmentFileLinkKz ?>">Cкачать прикрепленный файл (<?= $model->file_kz ?>)</a>

        </div>
        <div role="tabpanel" class="tab-pane" id="messages">

            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'file_eng',['inputOptions' => ['class' => 'inputfile ']])->fileInput(['multiple' => false]) ?>

            <a class="btn btn-success" style="margin-bottom: 20px" href="<?= $model->attachmentFileLinkEn ?>">Cкачать прикрепленный файл (<?= $model->file_en ?>)</a>

        </div>

    </div>

    <?= $form->field($model, 'category_id')->dropDownList(Yii::$app->params['fileCategory'], ['prompt' => '- Выберите категорию -']) ?>

    <?= $form->field($model, 'is_published')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
