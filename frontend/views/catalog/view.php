<?php
use himiklab\thumbnail\EasyThumbnailImage;
use frontend\widgets\ShareLinks;
use common\models\Lang;
use yii\helpers\Url;
use frontend\widgets\CategoryWidget;
use common\models\Category;
use common\models\Product;
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
            <?php $i = 0; foreach ($parentCategories as $parentCategory) { ?>
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
                        <?= (Lang::getCurrent()->id == 1) ? $parentCategory->title_en : ' '; ?>
                        <?= (Lang::getCurrent()->id == 2) ? $parentCategory->title_ru : ' '; ?>
                        <?= (Lang::getCurrent()->id == 3) ? $parentCategory->title_kz : ' '; ?>
                    </div>
                </div>
                <?php  $i++; } ?>
        </div>
        <div class="catalog-box">
            <?php $i = 0; foreach ($parentCategories as $parentCategory) { ?>
            <div class="catalog-box__item <?= ($i == 0) ? 'active' : ''?>">
                <ul class="catalog-menu">
                    <?php $thrdParentCategories = Category::find()->where(['parent_id'=>$parentCategory->id, 'is_published' => '1'])->all(); ?>
                    <?php $i = 0; foreach ($thrdParentCategories as $thrdParent){ ?>
                    <li class="catalog-menu__item <?= ($i == 0) ? 'active' : ''?>">
                        <?= (Lang::getCurrent()->id == 1) ? $thrdParent->title_en : ' '; ?>
                        <?= (Lang::getCurrent()->id == 2) ? $thrdParent->title_ru : ' '; ?>
                        <?= (Lang::getCurrent()->id == 3) ? $thrdParent->title_kz : ' '; ?>
                    </li>
                    <?php  $i++; } ?>
                </ul>
                <div class="catalog-tabs">
                    <?php $i = 0; foreach ($thrdParentCategories as $thrdParent){ ?>
                    <div class="catalog-tab__item <?= ($i == 0) ? 'active' : ''?>">
                        <?php $products = Product::find()->where(['is_published' => '1', 'category_id'=>$thrdParent->id])->orderBy('id DESC')->all();?>
                        <?php foreach ($products as $product){ ?>
                        <div class="product-card">
                            <div class="product-card__img">
                                <?= ($product->is_new) ? '<div class="new-card">'.Yii::t('app', 'New').'</div>' : ''?>
                                <?=
                                EasyThumbnailImage::thumbnailImg(
                                    $product->imagePath,
                                    265,
                                    235,
                                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                    [
                                        'class' => ''
                                    ]
                                );
                                ?>
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    <?= (Lang::getCurrent()->id == 1) ? $product->title_en : ' '; ?>
                                    <?= (Lang::getCurrent()->id == 2) ? $product->title_ru : ' '; ?>
                                    <?= (Lang::getCurrent()->id == 3) ? $product->title_kz : ' '; ?>
                                </div>
                                <?php if(Lang::getCurrent()->id == 1) { ?>
                                    <p><?php $anounce = strip_tags($product->description_en, '<a>'); echo mb_substr($anounce,0, 150, 'UTF-8').' ...'; ?></p>
                                <?php } elseif(Lang::getCurrent()->id == 2) { ?>
                                    <p><?php $anounce = strip_tags($product->description_ru, '<a>'); echo mb_substr($anounce,0, 150, 'UTF-8').' ...'; ?></p>
                                <?php } elseif(Lang::getCurrent()->id == 3) { ?>
                                    <p><?php $anounce = strip_tags($product->description_kz, '<a>'); echo mb_substr($anounce,0, 150, 'UTF-8').' ...'; ?></p>
                                <?php } ?>
                                <a href="<?= Url::toRoute(['/product/view', 'slug' => $product->slug]) ?>" class="product-button button"><?= Yii::t('app', 'Read more')?></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php  $i++; } ?>
                </div>
            </div>
            <?php  $i++; } ?>
        </div>
    </div>
</div>
