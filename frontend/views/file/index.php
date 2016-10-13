<?php
use yii\helpers\Html;
use yii\helpers\Url;
use \yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use common\models\Lang;

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'For professionals');

$this->registerMetaTag(['name'=> 'keywords', 'content' =>  '']);
$this->registerMetaTag(['name'=> 'description', 'content' => '']);

?>
<div class="container">
<div class="cr">
    <div class="content">
        <div class="title">
            <?= Yii::t('app', 'For professionals')?>
        </div>
        <?php if($publications) { ?>
        <div class="professionals-title ">
            <?= Yii::t('app', 'Publication')?>
        </div>
        <ul class="professionals-list">
            <?php foreach ($publications as $publication) { ?>
            <?php if(Lang::getCurrent()->id == 1 && $publication->title_en) { ?>
            <li class="professionals-list__item">
                <a href="<?= $publication->attachmentFileLinkEn ?>" class="professionals-list__item-link">
                   <?= $publication->title_en ?>
                </a>
            </li>
            <?php } elseif(Lang::getCurrent()->id == 2 && $publication->title_ru) { ?>
                <li class="professionals-list__item">
                    <a href="<?= $publication->attachmentFileLinkRu ?>" class="professionals-list__item-link">
                        <?= $publication->title_ru ?>
                    </a>
                </li>
            <?php } elseif(Lang::getCurrent()->id == 3 && $publication->title_kz) { ?>
                <li class="professionals-list__item">
                    <a href="<?= $publication->attachmentFileLinkKz ?>" class="professionals-list__item-link">
                        <?= $publication->title_kz ?>
                    </a>
                </li>
            <?php } ?>
            <?php } ?>
        </ul>
        <?php } ?>
        <?php if($brochures) { ?>
            <div class="professionals-title ">
                <?= Yii::t('app', 'Brochures')?>
            </div>
            <ul class="professionals-list">
                <?php foreach ($brochures as $brochure) { ?>
                    <?php if(Lang::getCurrent()->id == 1 && $brochure->title_en) { ?>
                        <li class="professionals-list__item">
                            <a href="<?= $brochure->attachmentFileLinkEn ?>" class="professionals-list__item-link">
                                <?= $brochure->title_en ?>
                            </a>
                        </li>
                    <?php } elseif(Lang::getCurrent()->id == 2 && $brochure->title_ru) { ?>
                        <li class="professionals-list__item">
                            <a href="<?= $brochure->attachmentFileLinkRu ?>" class="professionals-list__item-link">
                                <?= $brochure->title_ru ?>
                            </a>
                        </li>
                    <?php } elseif(Lang::getCurrent()->id == 3 && $brochure->title_kz) { ?>
                        <li class="professionals-list__item">
                            <a href="<?= $brochure->attachmentFileLinkKz ?>" class="professionals-list__item-link">
                                <?= $brochure->title_kz ?>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>
</div>