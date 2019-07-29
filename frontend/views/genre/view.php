<?php

/* @var $this \yii\web\View*/
/* @var $genre \common\essences\Genre*/

use common\helpers\StringHelper;
use common\widgets\SimilarFilms;
use yii\helpers\Html;

\frontend\assets\CommonAsset::register($this);
$this->title = StringHelper::ucfirst($genre->name);
?>

<?= Html::tag('div', 'Фильмы в жанре "'.$genre->name.'"', [
    'class' => 'display-3'
])?>

<?=
SimilarFilms::widget([
    'searchers' => [
        [
            'class' => \common\services\similar\GenreSearcher::class,
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
\common\widgets\CommentsWidget::widget([
    'table_id' => \common\essences\Comment::TABLE_GENRE,
    'page_id' => $genre->id,
])
?>
