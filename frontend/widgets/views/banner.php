<?php

use yii\helpers\Html;
use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;


/* @var $this yii\web\View
 * @var $news
 */
?>
<?php if($banners){ ?>
<div class="partner">
    <div class="partner-title title">
        <?= Yii::t('app', 'Partners') ?>
    </div>
    <div class="partner-list">
        <?php foreach ($banners as $banner) {?>
        <div class="partner-list__item">
            <img src="<?= $banner->image ?>" alt="">
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
