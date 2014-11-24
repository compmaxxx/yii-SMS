<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Major</h1>
<ul>
<?php foreach ($majors as $major): ?>
    <li>
        <?= Html::encode($major->name) ?>:
        <?= $major->id ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
