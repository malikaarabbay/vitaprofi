<?php
use himiklab\thumbnail\EasyThumbnailImage;
use frontend\widgets\ShareLinks;
use common\models\Lang;
use yii\helpers\Url;
use common\models\Category;
/* @var $this yii\web\View */
(Lang::getCurrent()->id == 1) ? $this->title = $model->title_en : ' ';
(Lang::getCurrent()->id == 2) ? $this->title = $model->title_ru : ' ';
(Lang::getCurrent()->id == 3) ? $this->title = $model->title_kz : ' ';
//
//$this->registerMetaTag(['name'=> 'keywords', 'content' =>  $model->meta_keywords]);
//$this->registerMetaTag(['name'=> 'description', 'content' => $model->meta_description]);

?>

<div class="container">
<div class="cr">
    <div class="title">
        <?php if(isset($model->parent->category)) {?>
        <?= (Lang::getCurrent()->id == 1) ? $model->parent->category->title_en : ' '; ?>
        <?= (Lang::getCurrent()->id == 2) ? $model->parent->category->title_ru : ' '; ?>
        <?= (Lang::getCurrent()->id == 3) ? $model->parent->category->title_kz : ' '; ?>
        <?php } else { ?>
            <?= (Lang::getCurrent()->id == 1) ? $model->category->title_en : ' '; ?>
            <?= (Lang::getCurrent()->id == 2) ? $model->category->title_ru : ' '; ?>
            <?= (Lang::getCurrent()->id == 3) ? $model->category->title_kz : ' '; ?>
        <?php }?>
    </div>
    <div class="product-second-lvl">
        <div class="product-slider">
            <div class="product-slider__big">
                <?php $i = 0; foreach($model->images as $image) {?>
                <div class="product-slider__big-item <?= ($i == 0) ? 'active' : ''?>">
                    <?php
                    echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                        $image->imagePath, 590, 435, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        [
                            'class' => ''
                        ]
                    );
                    ?>
                </div>
                <?php $i++; } ?>
            </div>
            <div class="product-slider__small">
                <?php $i = 0; foreach($model->images as $image) {?>
                <div class="product-slider__small-item <?= ($i == 0) ? 'active' : ''?>">
                    <?php
                    echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                        $image->imagePath, 190, 145, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        [
                            'class' => ''
                        ]
                    );
                    ?>
                </div>
                <?php $i++; } ?>
            </div>
        </div>
        <div class="product-description">
            <?php if(isset($model->parent->category)) {?>
            <a href="<?= Url::toRoute(['/catalog/view', 'slug' => $model->parent->category->slug]) ?>" class="back-catalog"><?= Yii::t('app', 'Back to directory') ?></a>
            <?php }?>
            <div class="product-description__name">
                <?= (Lang::getCurrent()->id == 1) ? $model->title_en : ' '; ?>
                <?= (Lang::getCurrent()->id == 2) ? $model->title_ru : ' '; ?>
                <?= (Lang::getCurrent()->id == 3) ? $model->title_kz : ' '; ?>
            </div>
            <div class="name-category product-description__item"><span><?= ($model->is_new) ? Yii::t('app', 'New') : ''?></span>
            </div>
            <div class="name-category product-description__item"><span><?= Yii::t('app', 'Name of product') ?>:</span>
                <?= (Lang::getCurrent()->id == 1) ? $model->title_en : ' '; ?>
                <?= (Lang::getCurrent()->id == 2) ? $model->title_ru : ' '; ?>
                <?= (Lang::getCurrent()->id == 3) ? $model->title_kz : ' '; ?>
            </div>
            <div class="id-product product-description__item"><span><?= Yii::t('app', 'Sku') ?>:</span> <?= $model->sku ?></div>
                <?= (Lang::getCurrent()->id == 1) ? $model->description_en : ' '; ?>
                <?= (Lang::getCurrent()->id == 2) ? $model->description_ru : ' '; ?>
                <?= (Lang::getCurrent()->id == 3) ? $model->description_kz : ' '; ?>
            <?php if($model->attachment) { ?>
            <a href="<?= $model->attachmentFileLink ?>" class="download-file button"><?= Yii::t('app', 'Download file') ?></a>
            <?php } ?>
            <?php if(isset($model->parent->category)) {?>
            <a href="<?= Url::toRoute(['/catalog/view', 'slug' => $model->parent->category->slug]) ?>" class="similar-product button"><?= Yii::t('app', 'Similar items') ?></a>
            <?php }?>
            <div class="podelitsia-soc-seti">
                <?= Yii::t('app', 'Social networks') ?>

            </div>
        </div>
    </div>
    <?php if($relatedProducts) {?>
    <div class="title">
        <?= Yii::t('app', 'Related products') ?>
    </div>
    <div class="related-products">
        <?php foreach ($relatedProducts as $relatedProduct) { ?>
        <div class="related-products__item">
            <div class="related-products__item-img">
                <?php
                echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                    $relatedProduct->imagePath, 280, 340, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                    [
                        'class' => ''
                    ]
                );
                ?>
            </div>
            <a href="<?= Url::toRoute(['/product/view', 'slug' => $relatedProduct->slug]) ?>" class="more">
                <?= Yii::t('app', 'Learn more') ?>
            </a>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>
</div>
