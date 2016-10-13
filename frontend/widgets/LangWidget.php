<?php

namespace frontend\widgets;

use common\models\Article;
use common\models\Lang;
use common\models\Slider;
use yii\base\Widget;

class LangWidget extends Widget
{

    public function init()
    {
        parent::init();

        $current = Lang::getCurrent();
        $langs = Lang::find()->where('id != :current_id', [':current_id' => Lang::getCurrent()->id])->all();

        echo $this->render('lang', [
            'langs' => $langs,
            'current' => $current,
        ]);

    }

}
