<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\helpers\Html;
use yii\helpers\Url; ?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><?= Html::a('Список всех фильмов', Url::to(['film/index']), [
                'class' => 'btn btn-lg btn-success'
            ])?></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">

                <p>10 случайных фильмов</p>

                <p><?= Html::a('Перейти', '', [
                        'class' => "btn btn-default"
                    ])?></p>
            </div>
            <div class="col-lg-4">

                <p>10 случайных жанров</p>

                <p><?= Html::a('Перейти', '', [
                        'class' => "btn btn-default"
                    ])?></p>
            </div>
            <div class="col-lg-4">

                <p>10 случайных режиссеров</p>

                <p><?= Html::a('Перейти', '', [
                        'class' => "btn btn-default"
                    ])?></p>
            </div>
        </div>

    </div>
</div>
