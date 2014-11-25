<?php

namespace app\controllers;

use Yii;
use app\models\SendTo;
use app\models\SendToSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * SendToController implements the CRUD actions for SendTo model.
 */
class SendToController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all SendTo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SendToSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SendTo model.
     * @param integer $report_id
     * @param integer $major_id
     * @param integer $year_id
     * @return mixed
     */
    public function actionView($report_id, $major_id, $year_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($report_id, $major_id, $year_id),
        ]);
    }

    /**
     * Creates a new SendTo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SendTo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'report_id' => $model->report_id, 'major_id' => $model->major_id, 'year_id' => $model->year_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SendTo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $report_id
     * @param integer $major_id
     * @param integer $year_id
     * @return mixed
     */
    public function actionUpdate($report_id, $major_id, $year_id)
    {
        $model = $this->findModel($report_id, $major_id, $year_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'report_id' => $model->report_id, 'major_id' => $model->major_id, 'year_id' => $model->year_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SendTo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $report_id
     * @param integer $major_id
     * @param integer $year_id
     * @return mixed
     */
    public function actionDelete($report_id, $major_id, $year_id)
    {
        $this->findModel($report_id, $major_id, $year_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SendTo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $report_id
     * @param integer $major_id
     * @param integer $year_id
     * @return SendTo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($report_id, $major_id, $year_id)
    {
        if (($model = SendTo::findOne(['report_id' => $report_id, 'major_id' => $major_id, 'year_id' => $year_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
