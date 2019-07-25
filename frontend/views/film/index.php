<?php

use backend\models\FilmSearch;
use common\essences\Film;
use common\widgets\SmallRatingWidget;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $view yii\web\View */
/* @var $searchModel backend\models\FilmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>

<div class="text-view">
    <div class="display-4">Список фильмов</div>
    <?= GridView::widget([
       'dataProvider' => $dataProvider,
       'searchModel' => $searchModel,
       'columns' => [
           [
               'attribute' => 'logo',
               'value' => function (Film $item) {
                    return Html::img($item->logo);
               }
           ],
           [
               'attribute' => 'title'
           ],
           [
               'attribute' => 'rating',
               'value' => function ($item) {
                    return SmallRatingWidget::widget([
                        'film' => $item
                    ]);
               }
           ],
           [
               'attribute' => 'country'
           ],
           [
               'attribute' => 'year'
           ],
           [
               'attribute' => 'genre',
               'value' => function ($item) {
                    return SmallGenreListWidget::widget([
                        'film' => $item
                    ]);
               }
           ]
       ]
    ]);
    ?>
</div>
