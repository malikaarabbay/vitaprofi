<?php
use common\models\Lang;
use himiklab\thumbnail\EasyThumbnailImage;

(Lang::getCurrent()->id == 1) ? $this->title = $model->title_en : ' ';
(Lang::getCurrent()->id == 2) ? $this->title = $model->title_ru : ' ';
(Lang::getCurrent()->id == 3) ? $this->title = $model->title_kz : ' ';


$this->registerMetaTag(['name'=> 'keywords', 'content' =>  $model->meta_keywords]);
$this->registerMetaTag(['name'=> 'description', 'content' => $model->meta_description]);

?>
<div class="container">
    <div class="cr">
        <div class="content">
            <div class="title">
                <?= (Lang::getCurrent()->id == 1) ? $model->title_en : ' '; ?>
                <?= (Lang::getCurrent()->id == 2) ? $model->title_ru : ' '; ?>
                <?= (Lang::getCurrent()->id == 3) ? $model->title_kz : ' '; ?>
            </div>
            <?php if($model->photo) { ?>
            <?=
            EasyThumbnailImage::thumbnailImg(
                $model->imagePath,
                500,
                200,
                EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                [
                    'class' => ''
                ]
            );
            ?>
            <?php } ?>
            <?= (Lang::getCurrent()->id == 1) ? $model->description_en : ' '; ?>
            <?= (Lang::getCurrent()->id == 2) ? $model->description_ru : ' '; ?>
            <?= (Lang::getCurrent()->id == 3) ? $model->description_kz : ' '; ?>
        </div>
    </div>
</div>
</div>