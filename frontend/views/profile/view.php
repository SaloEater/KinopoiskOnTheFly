<?php

/* @var $this View*/
/* @var $user User */

use common\essences\User;
use common\services\similar\UserFavoriteSearcher;
use common\widgets\SimilarFilms;
use frontend\assets\CommonAsset;
use yii\helpers\Html;
use yii\web\View;

CommonAsset::register($this)
?>

<div class="">
    <div class="display-3">

        <?= $user->username ?>
    </div>
    <?= Html::img($user->image_url); ?>
</div>

<div class="mt-4">
    <?= SimilarFilms::widget([
        'searchers' => [
            [
                'class' => UserFavoriteSearcher::class,
                'config' => [
                    'user' => $user
                ]
            ]
        ],
        'title' => 'Избранные фильмы',
        'display' => SimilarFilms::$DISPLAY_GRID
    ])

    ?>
</div>

