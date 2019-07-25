<?php

use backend\models\FilmSearch;
use common\essences\Film;
use common\widgets\SmallGenreListWidget;
use common\widgets\SmallRatingWidget;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\View;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $filterModel backend\models\FilmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

\frontend\assets\GridViewAsset::register($this);

?>

<div class="text-view">
    <div class="display-2 text-center">Список фильмов</div>
    <?= GridView::widget([
       'dataProvider' => $dataProvider,
       'filterModel' => $filterModel,
       'columns' => [
           [
               'attribute' => 'logo',
               'value' => function (Film $item) {
                    return Html::img($item->logo);
               },
               'format' => 'raw',
               'filter' => false
           ],
           [
               'attribute' => 'title',
               'value' => function (Film $film) {
                    return Html::a($film->title, Url::to(['/film/'.$film->slug]));
               },
               'format' => 'raw',
           ],
           [
               'attribute' => 'rating',
               'value' => function ($item) {
                    return SmallRatingWidget::widget([
                        'film' => $item
                    ]);
               },
               'format' => 'raw'
           ],
           [
               'attribute' => 'country'
           ],
           [
               'attribute' => 'publish_year'
           ],
           [
               'attribute' => 'genre',
               'value' => function ($item) {
                    return SmallGenreListWidget::widget([
                        'film' => $item
                    ]);
               },
               'format' => 'raw',
           ]
       ],
       'layout' => "{items}\n{pager}",
        'rowOptions' => [
                'class' => 'display-3'
        ]
    ]);
    ?>
</div>
