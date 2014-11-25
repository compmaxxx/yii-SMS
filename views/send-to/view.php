<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SendTo */

$this->title = $model->report_id;
$this->params['breadcrumbs'][] = ['label' => 'Send Tos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="send-to-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'report_id' => $model->report_id, 'major_id' => $model->major_id, 'year_id' => $model->year_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'report_id',
            'major_id',
            'year_id',
        ],
    ]) ?>

</div>
