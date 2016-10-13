<?php

namespace frontend\widgets;

use common\models\Banner;
use yii\base\Widget;

class BannerWidget extends Widget
{

    public function init()
    {
        parent::init();

        $banners = Banner::find()->where(['is_published' => '1'])->all();

        echo $this->render('banner', [
            'banners' => $banners,
        ]);

    }

}
