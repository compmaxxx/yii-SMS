<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Major;
use app\models\Year;

$this->title = 'Send SMS';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile("../js/mimo84-bootstrap-maxlength-37c95be/sendMsg.js", ['position'=>\yii\web\View::POS_END]);


$major = Major::find()->all();
$listMajor = ArrayHelper::map($major,'id','name');

$year = Year::find()->all();
$listYear = ArrayHelper::map($year,'id','year');
?>


<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
	<? //var_dump($model); ?>
	<?= $form->field($model, 'lstMY',['options'=>['value'=>'foo bar']])->hiddenInput()->label(false) ?>
	<div hidden>
	<? foreach ($listMajor as $Mkey => $Mvalue) { ?>
	<? foreach ($listYear as $Ykey => $Yvalue) { ?>
		<p id=<? echo '"x-'.$Mkey.'-'.$Ykey.'"'; ?> ><? echo $Mvalue.$Yvalue; ?></p>
	<?}}?>
	</div>
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

    <!-- Button trigger modal -->
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="float: right;">
	  Submit
	</button>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
	      </div>
	      <div class="modal-body">
	        <div><h1 class="text-center">Message
	        </h1>
	        	<p id="confirm-to"><strong>To:</strong> -</p>
	        	<p><strong>From:</strong> Department of Computer Engineering</p>
	        	<p><strong>Message:</strong></p>
	        	<p id="confirm-msg">asdadasdasdasdasd</p>
	        </div>


	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
	      </div>
	    </div>
	  </div>
	</div>


<?php ActiveForm::end(); ?>