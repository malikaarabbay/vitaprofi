<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($imageModel, 'title_ru')->textInput(['value' => $imageModel->title_ru])->label(false); ?>

    <?= $form->field($imageModel, 'title_kz')->textInput(['value' => $imageModel->title_kz])->label(false); ?>

    <?= $form->field($imageModel, 'title_en')->textInput(['value' => $imageModel->title_en])->label(false); ?>

    <div class="text-right">

        <?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) ?>

        <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>
