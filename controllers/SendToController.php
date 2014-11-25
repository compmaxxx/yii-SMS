<?php

namespace app\controllers;

use Yii;
use app\models\SendTo;
use app\models\SendToSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

        return $this->render('//send-to/index', [
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
        return $this->render('//send-to/view', [
            'model' => $this->findModel($report_id, $major_id, $year_id),
        ]);
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

        return $this->redirect(['//send-to/index']);
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
