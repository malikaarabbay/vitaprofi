<?php
/* @var $this yii\web\View */
$this->title = 'VitaProf';
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\BannerWidget;
use himiklab\thumbnail\EasyThumbnailImage;
use common\models\Lang;
?>
<div class="container">
    <div class="cr">
        <div class="title">
            <?= Yii::t('app', 'Our production') ?>
        </div>
        <div class="product-index">
            <div class="product-item">
                <a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>"><img src="img/corova.jpg" alt="" class="product-item__img"></a>
                <div class="product-item__text">
                    <?= Yii::t('app', 'Cattle breeding') ?>
                    <a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>" class="product-item-link"><?= Yii::t('app', 'Learn more') ?>...</a>
                </div>
            </div>
            <div class="product-item">
                <a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>"><img src="img/ptica.jpg" alt="" class="product-item__img"></a>
                <div class="product-item__text ptica">
                    <?= Yii::t('app', 'Poultry') ?>
                    <a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>" class="product-item-link"><?= Yii::t('app', 'Learn more') ?>...</a>
                </div>
            </div>
            <div class="product-item">
                <a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>"><img src="img/svinka.jpg" alt="" class="product-item__img"></a>
                <div class="product-item__text svinka">
                    <?= Yii::t('app', 'Pig') ?>
                    <a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>" class="product-item-link"><?= Yii::t('app', 'Learn more') ?>...</a>
                </div>
            </div>
            <div class="product-item">
                <a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>"><img src="img/oborudovanie.jpg" alt="" class="product-item__img"></a>
                <div class="product-item__text oborudovanie">
                    <?= Yii::t('app', 'Equipment') ?>
                    <a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>" class="product-item-link"><?= Yii::t('app', 'Learn more') ?>...</a>
                </div>
            </div>
        </div>
        <div class="about-index">
            <div class="about-index__img">
                <img src="img/about.jpg" alt="">
            </div>
            <div class="about-index__title title">
                Витапрофи
            </div>
            <p>Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание направлений прогрессивного развития. Задача организации, в особенности же реализация намеченных плановых заданий требуют от нас анализа модели развития. Таким образом реализация намеченных плановых заданий способствует подготовки и реализации систем массового участия. Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации.</p>
            <p>Таким образом дальнейшее развитие различных форм деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа соответствующий условий активизации. Повседневная практика показывает, что сложившаяся структура организации играет важную роль в формировании систем массового участия. Разнообразный и богатый опыт укрепление и развитие структуры требуют определения и уточнения системы обучения кадров, соответствует насущным потребностям.</p>
            <a href="" class="about-read-more">Узнать подробнее...</a>
        </div>
        <div class="news">
            <div class="news-title title">
                <?= Yii::t('app', 'News') ?>
            </div>
            <?php foreach ($newsList as $news) {?>
            <div class="news-item">
                <div class="news-date">
							<span><?= Yii::$app->formatter->asDate($news->created, 'dd') ?><br>
                                <?= Yii::$app->formatter->asDate($news->created, 'php:M') ?>
							</span>
                </div>
                <div class="news-item__img">
                    <?php
                    echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                        $news->imagePath, 250, 160, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        [
                            'class' => ''
                        ]
                    );
                    ?>
                </div>
                <a href="<?= Url::toRoute(['/news/view', 'slug' => $news->slug]) ?>" class="news-item__title">
                    <?= (Lang::getCurrent()->id == 1) ? $news->title_en : ' '; ?>
                    <?= (Lang::getCurrent()->id == 2) ? $news->title_ru : ' '; ?>
                    <?= (Lang::getCurrent()->id == 3) ? $news->title_kz : ' '; ?>
                </a>
                <p>
                    <?php if (Lang::getCurrent()->id == 1) {?>
                    <?= $anounce = strip_tags($news->description_en, '<a>'); echo mb_substr($anounce,0, 200, 'UTF-8').' ...'; ?>
                    <?php } elseif (Lang::getCurrent()->id == 2) {?>
                    <?= $anounce = strip_tags($news->description_ru, '<a>'); echo mb_substr($anounce,0, 200, 'UTF-8').' ...'; ?>
                    <?php } elseif (Lang::getCurrent()->id == 3) {?>
                    <?= $anounce = strip_tags($news->description_kz, '<a>'); echo mb_substr($anounce,0, 200, 'UTF-8').' ...'; ?>
                    <?php } ?>
                </p>
                <a href="<?= Url::toRoute(['/news/view', 'slug' => $news->slug]) ?>" class="read-more"><?= Yii::t('app', 'Learn more') ?>...</a>
            </div>
            <?php } ?>
        </div>
        <div class="reviews">
            <div class="reviews-title title">
                <?= Yii::t('app', 'Reviews') ?>
            </div>
            <div class="reviews-slider">
                <?php foreach ($reviews as $review) { ?>
                <div class="reviews-slider__item">
                    <div class="reviews-item__text">
                        <div class="reviews-item__title">
                            <?= $review->title ?>
                        </div>
                        <p><?= $review->review ?></p>
                    </div>
                    <div class="reviews-chel">
                        <div class="reviews-photo">
                            <?=
                            EasyThumbnailImage::thumbnailImg(
                                $review->imagePath,
                                60,
                                60,
                                EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                [
                                    'alt' => $review->fio,
                                ]
                            );
                            ?>
                        </div>
                        <div class="reviews-name">
                            <?= $review->fio ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?= BannerWidget::widget() ?>
    </div>
</div>

