<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use frontend\models\Search;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;
use \yii\widgets\Breadcrumbs;
use himiklab\thumbnail\EasyThumbnailImage;
use common\models\Lang;

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Site search');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="cr">
        <?php if($query == ''){?>
            <h1 class="query-message"><?= Yii::t('app', 'Enter the search query')?></h1>
        <?php }?>
        <div class="service">
            <div class="search-form-block">

                <?php $form = ActiveForm::begin(
                    [
                        'id' => 'search-form',
                        'action' => Url::toRoute('/search/index'),
                        'method' => 'get',
                    ]
                ); ?>

                <div class="bigsearch_part">
                    <div class="bigsearch_input">
                        <?= $form->field($model, 'query',['inputOptions' => ['class' => 'form-control search-text']])->textInput(['placeholder' => Yii::t('app', 'Search request'),'maxlength' => 75])->label(false) ?>
                    </div>
                    <div class="bigsearch_submit">
                        <?= Html::submitButton(Yii::t('app', 'Search'), ['name' => 'search-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

            <?php if((!$query == '') && !$queryWithTags){?>
                <?php if($resulCount != 0){?>
                    <h4 class="query-message result-message"><?= Yii::t('app', 'Results for:')?> <span class="result-query"><?=$query ?></span></h4>
                <?php } else {?>
                    <h4 class="query-message result-message"><?= Yii::t('app', 'On request')?> <span class="result-query"><?=$query ?></span></h4>

                    <h4 class="query-message result-message"><?= Yii::t('app', 'Nothing found')?> </h4>
                <?php }?>
            <?php } else {?>
                <h4 class="query-message result-message"><?= Yii::t('app', 'Incorrect request')?></h4>
            <?php } ?>

            <div>

                <?php if($productList){?>
                    <div class="result-item-title"><?= Yii::t('app', 'Products')?></div>

                    <ul class="news_ul news-search">
                        <?php foreach($productList as $product){?>
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
                        <?php }?>
                    </ul>
                <?php }?>
            </div>
        </div>
    </div>
</div>