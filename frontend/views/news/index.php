<?php
use yii\helpers\Html;
use yii\helpers\Url;
use \yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use common\models\Lang;

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'News');

$this->registerMetaTag(['name'=> 'keywords', 'content' =>  '']);
$this->registerMetaTag(['name'=> 'description', 'content' => '']);

?>
<div class="container">
    <div class="cr">
        <div class="content">
            <div class="title">
                <?= Yii::t('app', 'News') ?>
            </div>
            
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_item',
                'layout' => "{items}\n<div class='clearfix'></div>{pager}",
            ]) ?>
           
        </div>
    </div>
</div>
