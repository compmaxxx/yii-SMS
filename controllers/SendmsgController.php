<?php


namespace app\controllers;

use app\models\Major;
use app\models\SendMsgForm;
use app\models\Student;
use app\components\SMS;
use Yii;

class SendmsgController extends \yii\web\Controller
{
    public function actionSend()
    {
    	$model = new SendMsgForm();
      $major = Major::find()->all();

    	if ($model->load(Yii::$app->request->post()) && $model->validate()) {

          //FIND PHONE NUMBER FROM YEAR_ID AND MAJOR_ID
          $lstSend = [];
          $lst = explode(' ', $model->lstMY);
          foreach ($lst as $key => $value) {
            $my = array_map('intval',explode(',',$value));
            $student = Student::findBySql('SELECT phone FROM student WHERE year_id='.$my[1].' AND major_id='.$my[0])->all();
            foreach ($student as $key => $value){
              array_push($lstSend, $value->phone);
            } 
          }

          $sms = new SMS();
          $sms->username   = 'compmaxxx';
          $sms->password   = 'acb206';

          foreach($lstSend as $phone){
            $a = $sms->getCredit();
            /*var_dump( $a);
            $b = $sms->send( '0881903011', trim($phone), $message);
            var_dump( $b);*/
            //echo $phone." ".$message;
          }




    		return $this->render('result',[
      'model' => $model,'lstSend'=>$lstSend,'credit'=>$sms->getCredit()
      ]);
    	}else{



    		return $this->render('send',[
      'model' => $model
      ]);
    	}
    }

}
