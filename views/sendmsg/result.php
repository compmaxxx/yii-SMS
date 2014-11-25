<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Major;
use app\models\Year;

$this->title = 'Pending';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile("../js/result_send.js", ['position'=>\yii\web\View::POS_END]);


$major = Major::find()->all();
$listMajor = ArrayHelper::map($major,'id','name');

$year = Year::find()->all();
$listYear = ArrayHelper::map($year,'id','year');


?>


<h1><?= Html::encode($this->title) ?></h1>
<? //var_dump($lstSend) ?>
<? //var_dump((string)$credit[0]."".(string)$credit[1]) ?>
<? if((string)$credit[0]=="success"){ ?>

    <div class="progress">
      <div id="progress" class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
        0%
      </div>
    </div>
    <h1 id="progress-complete" class="text-center text-primary">
      Messages have been sent.
    </h1>

<? }else{ ?>
    <div class="alert alert-danger text-center" role="alert">
    <h1 class="text-center text-danger">
      ERROR: <? echo $credit[0]; ?>
    </h1>
    </div>
    <div class="alert alert-danger text-center" role="alert">
        <h2>Credit remaining: <? echo $credit[1]; ?> </h2>
        <h2>The number of message: <? echo sizeof($lstSend); ?> </h2>
    </div>
    <div class="text-center">
    <a href="javascript:history.back()"><button type="button" class="btn btn-danger" data-dismiss="modal">Back</button></a>
    </div>
<? }?>