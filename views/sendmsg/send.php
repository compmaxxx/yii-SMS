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
	
	<input type='hidden' name='xxx[]' value='1'>
	<input type='hidden' name='xxx[]' value='2'>

    <div id="ListMenu_Hidden" hidden>
	    <div no='a1' id class='row' style="margin-top: 10px;">
	    	<div class='col-md-5'>
	    		<select id="sendmsgform-major_id" class="form-control" name="SendMsgForm[major_id]">
	    			<?
	    				foreach ($listMajor as $key => $value) {
	    					echo '<option value="'.$key.'">'.$value.'</option>';
	    				}
	    			?>
	    		</select>
	    	</div>
	    	<div class='col-md-5'>
	    		<select id="sendmsgform-major_id" class="form-control" name="SendMsgForm[major_id]">
	    			<?
	    				foreach ($listYear as $key => $value) {
	    					echo '<option value="'.$key.'">'.$value.'</option>';
	    				}
	    			?>
	    		</select>
	    	</div>
		    <input no='a1' type='button' value='Delete' class='btn btn-danger'>
	    </div>
    </div>
    <div id="ListMenu">
    	<label class="control-label col-md-5" >Major</label>
    	<label class="control-label col-md-5" >Year</label>
    	<label class="control-label " >Delete</label>
    	<div no='a1' id class='row' style="margin-top: 10px;">
	    	<div class='col-md-5'>
	    		<select id="sendmsgform-major_id" class="form-control" name="SendMsgForm[major_id]">
	    			<?
	    				foreach ($listMajor as $key => $value) {
	    					echo '<option value="'.$key.'">'.$value.'</option>';
	    				}
	    			?>
	    		</select>
	    	</div>
	    	<div class='col-md-5'>
	    		<select id="sendmsgform-major_id" class="form-control" name="SendMsgForm[major_id]">
	    			<?
	    				foreach ($listYear as $key => $value) {
	    					echo '<option value="'.$key.'">'.$value.'</option>';
	    				}
	    			?>
	    		</select>
	    	</div>
		    <input no='a1' type='button' value='Delete' class='btn btn-danger'>
	    </div>
    </div>
    <input type='button' id='addList' value='Add' class='btn btn-primary btn-block' style="margin-top: 10px;">
    <?= $form->field($model, 'msg')->textArea(['rows' => '6','maxlength'=>'72']) ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>