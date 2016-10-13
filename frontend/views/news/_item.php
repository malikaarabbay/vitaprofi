<?php
use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Url;
use common\models\Lang;
?>
<div class="news-item">
    <div class="news-date">
        <span><?= Yii::$app->formatter->asDate($model->created, 'dd') ?><br>
            <?= Yii::$app->formatter->asDate($model->created, 'php:M') ?>
        </span>
    </div>
    <div class="news-item__img">
        <?php
        echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
            $model->imagePath, 250, 160, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
            [
                'class' => ''
            ]
        );
        ?>
    </div>
    <a href="<?= Url::toRoute(['/news/view', 'slug' => $model->slug]) ?>" class="news-item__title">
        <?= (Lang::getCurrent()->id == 1) ? $model->title_en : ' '; ?>
        <?= (Lang::getCurrent()->id == 2) ? $model->title_ru : ' '; ?>
        <?= (Lang::getCurrent()->id == 3) ? $model->title_kz : ' '; ?>
    </a>
    <p>
        <?php if (Lang::getCurrent()->id == 1) {?>
            <?= $anounce = strip_tags($model->description_en, '<a>'); echo mb_substr($anounce,0, 200, 'UTF-8').' ...'; ?>
        <?php } elseif (Lang::getCurrent()->id == 2) {?>
            <?= $anounce = strip_tags($model->description_ru, '<a>'); echo mb_substr($anounce,0, 200, 'UTF-8').' ...'; ?>
        <?php } elseif (Lang::getCurrent()->id == 3) {?>
            <?= $anounce = strip_tags($model->description_kz, '<a>'); echo mb_substr($anounce,0, 200, 'UTF-8').' ...'; ?>
        <?php } ?>
    </p>
    <a href="<?= Url::toRoute(['/news/view', 'slug' => $model->slug]) ?>" class="read-more"><?= Yii::t('app', 'Learn more') ?>...</a>
</div>



