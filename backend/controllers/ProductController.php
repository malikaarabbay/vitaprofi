<?php

namespace backend\controllers;

use common\models\Image;
use common\models\Category;
use Yii;
use common\models\Product;
use common\models\search\ProductSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'fileapi-upload' => [
                'class' => FileAPIUpload::className(),
                'path' => '@frontend/web/images/',
                'unique' => true,
            ]
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($image_tab = false)
    {
        $model = new Product();
        $categories = Category::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->saveFile();
            $model->saveImages();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'image_tab' => $image_tab,
                'categories' => $categories
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $image_tab = false)
    {
        $model = $this->findModel($id);
        $categories = Category::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->saveFile();
            $model->saveImages();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'categories' => $categories,
                'image_tab' => $image_tab
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpdateImageTitle($image_id) {

        $imageModel = Image::findOne($image_id);
        $item_id = Product::findOne($imageModel->item_id)->id;

        if ($imageModel->load(Yii::$app->request->post()) && $imageModel->save() ) {
            return $this->redirect(['update',
                'id' => $item_id,
                'image_tab' => true
            ]);
        } else {
            return $this->renderAjax('_imageUpdate', [
                'imageModel' => $imageModel,
                'news_id' => $item_id,
            ]);
        }
    }

    public function actionImageDelete($id){
        $imageModel = Image::findOne($id);

        $itemId = $imageModel->item_id;

        $imageModel->delete();
        return $this->redirect(['update',
            'id' => $itemId,
            'image_tab' => true
        ]);
    }
}
