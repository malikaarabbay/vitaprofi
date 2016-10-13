<?php

namespace frontend\controllers;

use common\models\Image;
use common\models\File;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class FileController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $publications = File::find()->where(['is_published' => '1', 'category_id' => '1'])->orderBy('created DESC')->all();
        $brochures = File::find()->where(['is_published' => '1', 'category_id' => '2'])->orderBy('created DESC')->all();
        
        return $this->render('index', [
            'publications' => $publications,
            'brochures' => $brochures,
        ]);
    }
    

    protected function findNews($id)
    {
        if (($model = File::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}