<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Major;
use app\models\Year;

$this->title = 'Send SMS';
$this->params['breadcrumbs'][] = $this->title;


$major = Major::find()->all();
$listMajor = ArrayHelper::map($major,'id','name');

$year = Year::find()->all();
$listYear = ArrayHelper::map($year,'id','year');
?>


<h1><?= Html::encode($this->title) ?></h1>
<? var_dump($lstSend) ?>
<? var_dump($credit) ?>