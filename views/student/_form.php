<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 100]) ?>

    <? /* $form->dropDownList($model,'major_id',$major,array('empty'=>'(Select Major)'))*/ ?>
    <?= $form->field($model, 'major_id')->textInput(); ?>

    <?= $form->field($model, 'year_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
