<?php

/* @var $this View*/
/* @var $genre Genre*/

use common\essences\Comment;
use common\essences\Genre;
use common\helpers\StringHelper;
use common\services\similar\GenreSearcher;
use common\widgets\CommentsWidget;
use common\widgets\SimilarFilms;
use frontend\assets\CommonAsset;
use yii\helpers\Html;
use yii\web\View;

CommonAsset::register($this);
$this->title = StringHelper::ucfirst($genre->name);
?>

<?= Html::tag('div', 'Фильмы в жанре "'.$genre->name.'"', [
    'class' => 'display-3'
])?>

<?=
SimilarFilms::widget([
    'searchers' => [
        [
            'class' => GenreSearcher::class,
            'config' => [
                'genre' => $genre
            ]
        ],
    ],
    'title' => 'Фильмы',
    'display' => SimilarFilms::$DISPLAY_GRID
]);
?>

<?=
CommentsWidget::widget([
    'table_id' => Comment::TABLE_GENRE,
    'page_id' => $genre->id,
])
?>
