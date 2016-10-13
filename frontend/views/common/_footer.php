<?php
use yii\helpers\Url;
?>
<footer>
    <div class="cr">
        <div class="footer">
            <div class="footer-item">
                <ul class="footer-catalog">
                    <div class="footer-item_head">
                        <?= Yii::t('app', 'Catalog') ?>
                    </div>
                    <li class="footer-catalog_item"><a href="<?= Url::toRoute(['/catalog/view', 'slug' => 'skotovodstvo']) ?>" class="footer-catalog_item-link"><?= Yii::t('app', 'Cattle breeding') ?></a></li>
                    <li class="footer-catalog_item"><a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>" class="footer-catalog_item-link"><?= Yii::t('app', 'Poultry') ?></a></li>
                    <li class="footer-catalog_item"><a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>" class="footer-catalog_item-link"><?= Yii::t('app', 'Pig') ?></a></li>
                    <li class="footer-catalog_item"><a href="<?= Url::toRoute(['/catalog/view', 'slug' => '']) ?>" class="footer-catalog_item-link"><?= Yii::t('app', 'Equipment') ?></a></li>
                </ul>
                <ul class="footer-site-maps">
                    <div class="footer-item_head">
                        <?= Yii::t('app', 'Catalog') ?>
                    </div>
                    <li class="footer-site-maps_item"><a href="/" class="footer-catalog_item-link"><?= Yii::t('app', 'Home') ?></a></li>
                    <li class="footer-site-maps_item"><a href="<?= Url::toRoute(['/file/index']) ?>" class="footer-catalog_item-link"><?= Yii::t('app', 'For professionals') ?></a></li>
                    <li class="footer-site-maps_item"><a href="<?= Url::toRoute(['/catalog/index']) ?>" class="footer-catalog_item-link"><?= Yii::t('app', 'Products') ?></a></li>
                    <li class="footer-site-maps_item"><a href="<?= Url::toRoute(['/gallery/view', 'slug' => 'fotogallerea']) ?>" class="footer-catalog_item-link"><?= Yii::t('app', 'Photo Gallery') ?></a></li>
                    <li class="footer-site-maps_item"><a href="<?= Url::toRoute(['/article/view', 'slug' => 'uslugi']) ?>" class="footer-catalog_item-link"><?= Yii::t('app', 'Services') ?></a></li>
                    <li class="footer-site-maps_item"><a href="<?= Url::toRoute(['/article/view', 'slug' => 'o-nas']) ?>" class="footer-catalog_item-link"><?= Yii::t('app', 'About us') ?></a></li>
                    <li class="footer-site-maps_item"><a href="<?= Url::toRoute(['/site/contact']) ?>" class="footer-catalog_item-link"><?= Yii::t('app', 'Contacts') ?></a></li>
                </ul>
            </div>
            <div class="footer-item">
                <div class="footer-item__copyright">
                    www.sitename.kz<br>
                    <?= Yii::t('app', 'All rights reserved © 2016') ?>
                </div>
                <div class="footer-item__developed">
                    <?= Yii::t('app', 'Developed') ?>
                    <a href=""> <img src="/img/astanacreative.png" alt=""></a>
                    <ul class="soc-list">
                        <li class="soc-list-item"><a href="" class="soc-list-item__link"><img src="/img/face.png" alt=""></a></li>
                        <li class="soc-list-item"><a href="" class="soc-list-item__link"><img src="/img/twitter.png" alt=""></a></li>
                        <li class="soc-list-item"><a href="" class="soc-list-item__link"><img src="/img/linkedin.png" alt=""></a></li>
                        <li class="soc-list-item"><a href="" class="soc-list-item__link"><img src="/img/youtube.png" alt=""></a></li>
                        <li class="soc-list-item"><a href="" class="soc-list-item__link"><img src="/img/google.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>