<?php
use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Lang;

/* @var $this yii\web\View */

/**
 * <?= $this->render('_gallery', [
'model' => $model
]) ?>
 */
?>
<?php foreach($model->images as $images) {?>
<li class="gallery-list__item">
        <a class="gallery-list__item-link fancybox" data-fancybox-group="gallery" href="<?= $images->image ?>">
            <?php
            echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                $images->imagePath, 278, 178, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                [
                    'class' => ''
                ]
            );
            ?>
        </a>
        <div class="gallery-list__item-name">
            <?= (Lang::getCurrent()->id == 1) ? $images->title_en : ' '; ?>
            <?= (Lang::getCurrent()->id == 2) ? $images->title_ru : ' '; ?>
            <?= (Lang::getCurrent()->id == 3) ? $images->title_kz : ' '; ?>
        </div>
    
</li>
<?php }?>
