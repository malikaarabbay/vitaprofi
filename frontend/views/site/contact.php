<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="cr">
        <div class="title">
            <?= Yii::t('app', 'Contacts') ?>
        </div>
        <div class="contact">
            <div class="contact-item">
                <div class="contact-title">
                    <?= Yii::t('app', 'How to find us') ?>:
                </div>
                <ul class="contact-list">
                    <li class="contact-list__item contact-address"><?= Yii::t('app', 'Location') ?></li>
                    <li class="contact-list__item contact-phone">+7 (777) 777-77-77</li>
                    <li class="contact-list__item contact-mail">email@domain.kz </li>
                </ul>
                <ul class="social-list">
                    <div class="social-head"><?= Yii::t('app', 'Social networks') ?>:</div>
                </ul>
            </div>
            <div class="contact-item">
                <?php $form = ActiveForm::begin(['id' => 'contact-form', 'layout' => 'horizontal']); ?>
                <?= $form->field($model, 'name', ['inputOptions' => ['class' => 'contact-input']])->label(Yii::t('app', 'Name').': <span class="contact-blue">*</span>') ?>
                <?= $form->field($model, 'email', ['inputOptions' => ['class' => 'contact-input']])->label('E-mail: <span class="contact-blue">*</span>') ?>
                <?= $form->field($model, 'body', ['inputOptions' => ['class' => 'contact-textarea']])->textArea(['rows' => 10, 'cols' => 30])->label(Yii::t('app', 'Message').': <span class="contact-blue">*</span>') ?>

                <div class="form-group text-center">
                    <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'form-button button', 'name' => 'contact-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

