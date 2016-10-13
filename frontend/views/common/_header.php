<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use frontend\widgets\LangWidget;
use common\models\Slider;
use common\models\Lang;
use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Url;

?>
<header>
    <div class="top-line">
        <div class="cr">
            <div class="top-line_item">
                <a href="" class="top-item phone">
                    +7 (777) 777-77-77
                </a>
                <a href="" class="top-item mail">
                    sitename@mail.kz
                </a>
            </div>
            <div class="top-line_item">
                <?= LangWidget::widget() ?>
            </div>
        </div>
    </div>
    <div class="cr">
        <div class="head">
            <a href="/" class="head-logo logo">
                <img src="/img/logo.png" alt="">
            </a>
            <ul class="nav nav-head">
                <li class="nav-item"><a href="/" class="nav-item__link active"><?= Yii::t('app', 'Home') ?></a></li>
                <li class="nav-item"><a href="<?= Url::toRoute(['/catalog/index']) ?>" class="nav-item__link"><?= Yii::t('app', 'Products') ?></a></li>
                <li class="nav-item"><a href="<?= Url::toRoute(['/article/view', 'slug' => 'uslugi']) ?>" class="nav-item__link"><?= Yii::t('app', 'Services') ?></a></li>
                <li class="nav-item"><a href="<?= Url::toRoute(['/article/view', 'slug' => 'o-nas']) ?>" class="nav-item__link"><?= Yii::t('app', 'About us') ?></a></li>
                <li class="nav-item"><a href="<?= Url::toRoute(['/file/index']) ?>" class="nav-item__link"><?= Yii::t('app', 'For professionals') ?> </a></li>
                <li class="nav-item"><a href="<?= Url::toRoute(['/gallery/view', 'slug' => 'fotogallerea']) ?>" class="nav-item__link"><?= Yii::t('app', 'Photo Gallery') ?></a></li>
                <li class="nav-item"><a href="<?= Url::toRoute(['/site/contact']) ?>" class="nav-item__link"><?= Yii::t('app', 'Contacts') ?></a></li>
            </ul>
            <div class="serach-container">
                <div class="search-icon">
                    <img src="/img/search.svg" alt="">
                </div>
                <div class="search">
                    <form id="search-form" action="/search/index" method="get" role="form">
                        <input type="search" id="search-query" name="Search[query]" class="search-input" placeholder="<?= Yii::t('app', 'Site search') ?>">
                        <div class="search-button">
                        <button onclick="document.getElementById('search-form').submit()" type="submit"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="slider" >
        <?php $slides = Slider::find()->where(['is_published' => '1'])->orderBy('sort_index DESC')->all(); ?>
        <?php foreach ($slides as $slide) {?>
        <div class="slider__item">
            <div class="slider_item_img">
                <?=
                EasyThumbnailImage::thumbnailImg(
                    $slide->imagePath,
                    1920,
                    550,
                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                    [
                        'class' => '',
                    ]
                );
                ?>
            </div>
            <div class="slider__item-text">
                <?= (Lang::getCurrent()->id == 1) ? $slide->title_en : ' '; ?>
                <?= (Lang::getCurrent()->id == 2) ? $slide->title_ru : ' '; ?>
                <?= (Lang::getCurrent()->id == 3) ? $slide->title_kz : ' '; ?>
            </div>
        </div>
        <?php } ?>
    </div>
</header>