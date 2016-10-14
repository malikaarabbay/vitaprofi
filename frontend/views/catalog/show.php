<?php
use himiklab\thumbnail\EasyThumbnailImage;
use frontend\widgets\ShareLinks;
use common\models\Lang;
use yii\helpers\Url;
use common\models\Category;
/* @var $this yii\web\View */

(Lang::getCurrent()->id == 1) ? $this->title = $category->title_en : ' ';
(Lang::getCurrent()->id == 2) ? $this->title = $category->title_ru : ' ';
(Lang::getCurrent()->id == 3) ? $this->title = $category->title_kz : ' ';
//
//$this->registerMetaTag(['name'=> 'keywords', 'content' =>  $model->meta_keywords]);
//$this->registerMetaTag(['name'=> 'description', 'content' => $model->meta_description]);

?>

<div class="container">
    <div class="cr">
        <div class="title">
            <?= (Lang::getCurrent()->id == 1) ? $category->title_en : ' '; ?>
            <?= (Lang::getCurrent()->id == 2) ? $category->title_ru : ' '; ?>
            <?= (Lang::getCurrent()->id == 3) ? $category->title_kz : ' '; ?>
        </div>
        <div class="catalog">
            <ul>
                <?php foreach ($thrdParentCategories as $thrdParent){ ?>
                    <li><?= $thrdParent->title_ru ?></li>
                <?php } ?>
                <?php foreach ($products as $product){ ?>
                    <li><?= $product->title_ru ?></li>
                <?php } ?>
            </ul>
            <?php $i = 0; foreach ($parent2Categories as $parentCategory) { ?>
                <div class="catalog-item product-item <?= ($i == 0) ? 'active' : ''?>">
                    <?php
                    echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                        $parentCategory->imagePath, 590, 250, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        [
                            'class' => 'product-item__img'
                        ]
                    );
                    ?>
                    <div class="catalog-item__text">
                        <a href="<?= Url::toRoute(['/catalog/show', 'slug' => $parentCategory->slug]) ?>">
                            <?= (Lang::getCurrent()->id == 1) ? $parentCategory->title_en : ' '; ?>
                            <?= (Lang::getCurrent()->id == 2) ? $parentCategory->title_ru : ' '; ?>
                            <?= (Lang::getCurrent()->id == 3) ? $parentCategory->title_kz : ' '; ?>
                        </a>
                    </div>
                </div>
                <?php  $i++; } ?>
        </div>
    </div>
</div>
