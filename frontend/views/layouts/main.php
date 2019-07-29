<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
AppAsset::register($this);
\frontend\assets\FontAwesomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top bg-dark navbar-dark',
        ],
        'innerContainerOptions' => [
            'class' => 'container d-flex justify-between'
        ]
    ]);
    $menuItems = [];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Зарегистрироваться', 'url' => ['/site/signup'], 'active' => true];
        $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login'], 'active' => true];
    } else {
        $menuItems[] = '<div >'
            . Html::beginForm(['/site/logout'], 'post',[
                    'class' => 'active nav-link'
            ])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn logout','style'=>'color:#fff;']
            )
            . Html::endForm()
            . '</div>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
