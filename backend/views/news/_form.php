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
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="<?= ($image_tab) ? '' : 'active'?>">
                <a href="#tab_1" data-toggle="tab">Данные</a>
            </li>
            <li class="pull-right">
                <?= Html::submitButton($model->isNewRecord ?
                        '<span class="glyphicon glyphicon-plus"></span> '.Yii::t('app', 'Create') :
                        '<span class="glyphicon glyphicon-floppy-disk"></span> '.Yii::t('app', 'Save'),
                    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane <?= ($image_tab) ? '' : 'active'?>" id="tab_1">

                <div class="row">
                    <div class="col-md-8 col-xs-12">

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

                                <?= $form->field($model, 'description_ru')->widget(Widget::className(), [
                                    'settings' => [
                                        'lang' => 'ru',
                                        'minHeight' => 150,
                                        'imageUpload' => Url::to(['/site/image-upload']),
                                        'imageManagerJson' => Url::to(['/site/images-get']),
                                        'plugins' => [
                                            'imagemanager'
                                        ]
                                    ]
                                ]); ?>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">

                                <?= $form->field($model, 'title_kz')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'description_kz')->widget(Widget::className(), [
                                    'settings' => [
                                        'lang' => 'ru',
                                        'minHeight' => 150,
                                        'imageUpload' => Url::to(['/site/image-upload']),
                                        'imageManagerJson' => Url::to(['/site/images-get']),
                                        'plugins' => [
                                            'imagemanager'
                                        ]
                                    ]
                                ]); ?>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">

                                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'description_en')->widget(Widget::className(), [
                                    'settings' => [
                                        'lang' => 'ru',
                                        'minHeight' => 150,
                                        'imageUpload' => Url::to(['/site/image-upload']),
                                        'imageManagerJson' => Url::to(['/site/images-get']),
                                        'plugins' => [
                                            'imagemanager'
                                        ]
                                    ]
                                ]); ?>

                            </div>

                        </div>

                        <?= $form->field($model, 'is_published')->checkbox() ?>

                    </div>

                    <div class="col-md-4 col-xs-12">
                        <?= $form->field($model, 'photo')->widget(
                            FileAPI::className(),
                            [
                                'settings' => [
                                    'url' => ['fileapi-upload'],
                                    'elements' => [
                                        'preview' => [
                                            'width' => 250,
                                            'height' => 200
                                        ]
                                    ],
                                ],
                            ])
                        ?>

                        <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 4]) ?>

                        <?= $form->field($model, 'meta_description')->textarea(['rows' => 4]) ?>

                        <?= $form->field($model, 'slug')->textInput(['maxlength' => 255]) ?>

                    </div>
                </div>

            </div><!-- /.tab-pane -->

            <div class="tab-pane <?= ($image_tab) ? 'active' : ''?> " id="tab_2">

                <?= $form->field($model, 'file[]')->fileInput(['multiple' => true]) ?>
                <hr/>

                <div class="row">
                    <?= $this->render('_newsImages',[
                        'images' => $model->images,
                    ]) ?>
                </div>

            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div>

    <?php ActiveForm::end(); ?>

</div>

