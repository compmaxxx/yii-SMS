<?php


namespace app\controllers;

use app\models\SendMsgForm;
use Yii;

class SendmsgController extends \yii\web\Controller
{
    public function actionSend()
    {
    	$model = new SendMsgForm();
    	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    		return $this->render('send',[
      'model' => $model
      ]);
    	}else{
    		return $this->render('send',[
      'model' => $model
      ]);
    	}
    }

}
