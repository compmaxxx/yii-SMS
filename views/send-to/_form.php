<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SendTo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="send-to-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'report_id')->textInput() ?>

    <?= $form->field($model, 'major_id')->textInput() ?>

    <?= $form->field($model, 'year_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
