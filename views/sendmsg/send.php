<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Send SMS';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('TEP') ?>

    <?= $form->field($model, 'msg')->textArea(['rows' => '6']) ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


<script>
	jQuery(document).ready(function(){
		jQuery('#sendmsgform-msg').maxlength({
            threshold: 20
        });
	});
</script>