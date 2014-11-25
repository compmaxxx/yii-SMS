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
<?php $form = ActiveForm::begin(); ?>
	<? //var_dump($model); ?>
	<?= $form->field($model, 'lstMY',['options'=>['value'=>'foo bar']])->hiddenInput()->label(false) ?>
    <div class="container">
        <div class="col-md-12 text-center"><h4>Pick The Destination</h4></div>
        <? foreach ($listMajor as $Mkey => $Mvalue) { ?>
  			<div class="col-sm-2">
  			<div class="list-group" id=<? echo '"'.$Mkey.'"'; ?>>
  			<a href="#" class="list-group-item active"><? echo $Mvalue; ?><input title="toggle all" type="checkbox" class="all pull-right"></a>
  			<? foreach ($listYear as $Ykey => $Yvalue) { ?>
		          <a href="#" class="list-group-item"><? echo $Yvalue; ?><input type="checkbox" class="pull-right" value=<? echo '"'.$Mkey.','.$Ykey.'"';?> name="CheckYear"></a>
         	<? } ?>
         	</div> 
         	</div>
         <? } ?>
    </div>
    <?= $form->field($model, 'msg')->textArea(['rows' => '6','maxlength'=>'72']) ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>