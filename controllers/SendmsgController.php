<?php


namespace app\controllers;

use app\models\Major;
use app\models\SendMsgForm;
use app\models\Student;
use app\models\Report;
use app\models\SendTo;
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

          $error_sms = $sms->getCredit();

          if(sizeof($lstSend) > (string)$error_sms[1]){
                $error_sms = array("Credit is not enough. Please fill them on the provider web.",(string)$error_sms[1]);
          }else{
              foreach($lstSend as $phone){
                $error_sms = $sms->getCredit();
                //$b = $sms->send( '0894363905', trim($phone), $model->msg);
              }
          }

          
          $report = new Report();
          $report->message = $model->msg;
          if((string)$error_sms[0]=='success')
            $report->state = 'OK';
          else
            $report->state = 'ERROR';
          $report->save();
          //$report_id = $report->id;
          //Report::findBySql('SELECT LAST(phone) FROM student WHERE year_id='.$my[1].' AND major_id='.$my[0])->;

          $lst = explode(' ', $model->lstMY);
          foreach ($lst as $key => $value) {
            $my = array_map('intval',explode(',',$value));
            $sendto = new SendTo();
            $sendto->report_id = $report->id;
            $sendto->major_id = $my[0];
            $sendto->year_id = $my[1];
            $sendto->save();
          }







    		return $this->render('result',[
      'model' => $model,'lstSend'=>$lstSend,'credit'=>$error_sms
      ]);
    	}else{



    		return $this->render('send',[
      'model' => $model
      ]);
    	}
    }

}
