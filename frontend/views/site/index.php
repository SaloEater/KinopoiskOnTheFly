<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><?= \yii\helpers\Html::a('Список всех фильмов', \yii\helpers\Url::to(['film/index']), [
                'class' => 'btn btn-lg btn-success'
            ])?></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">

                <p>10 случайных фильмов</p>

                <p><?= \yii\helpers\Html::a('Перейти', '', [
                        'class' => "btn btn-default"
                    ])?></p>
            </div>
            <div class="col-lg-4">

                <p>10 случайных жанров</p>

                <p><?= \yii\helpers\Html::a('Перейти', '', [
                        'class' => "btn btn-default"
                    ])?></p>
            </div>
            <div class="col-lg-4">

                <p>10 случайных режиссеров</p>

                <p><?= \yii\helpers\Html::a('Перейти', '', [
                        'class' => "btn btn-default"
                    ])?></p>
            </div>
        </div>

    </div>
</div>
