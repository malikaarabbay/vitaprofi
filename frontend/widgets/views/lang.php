<?php
use yii\helpers\Url;
?>
<div class="lang">
    <div class="lang-select__current"><img src="/img/<?= $current->photo ?>" alt=""></div>
    <div class="lang-select__list asd" >
        <?php foreach ($langs as $lang):?>
        <div class="lang-select__option" ><a href="<?='/'.$lang->url.Yii::$app->getRequest()->getLangUrl()?>"><img src="/img/<?= $lang->photo ?>" alt=""></a></div>
        <?php endforeach;?>
    </div>
</div>
