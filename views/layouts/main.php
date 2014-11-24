<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'NotifyInfoBySMS',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([

                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => [
                    [
                      'label' => 'SendMessage', 'url' => ['/sendmsg/send'],
                      'active' => Yii::$app->controller->id=='sendmsg',
                    ],
                    [
                      'label' => 'Report', 'url' => ['/site/about'],
                      'active' => Yii::$app->controller->id=='site',
                    ],
                    [
                      'label' => 'Student', 'url' => ['/student/index'],
                      'active' => Yii::$app->controller->id=='student',
                    ],
                    [
                      'label' => 'Major', 'url' => ['/major/index'],
                      'active' => Yii::$app->controller->id=='major',
                    ],
                    [
                      'label' => 'Year', 'url' => ['/year/index'],
                      'active' => Yii::$app->controller->id=='year',
                    ],

                ],

            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' =>
                  [
                      Yii::$app->user->isGuest ?
                      ['label' => 'Login', 'url' => ['/site/login']] :
                      ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                          'url' => ['/site/logout'],
                          'linkOptions' => ['data-method' => 'post']],
                  ],
              ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
