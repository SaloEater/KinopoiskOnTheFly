<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 19:42
 */

namespace common\widgets;

use common\essences\Film;
use yii\data\BaseDataProvider;
use yii\db\ActiveRecord;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\Widget;

class FilmGridViewWidget extends Widget
{
    /* @var $dataProvider BaseDataProvider*/
    public $dataProvider;

    /* @var $filterModel ActiveRecord*/
    public $filterModel;

    public function run()
    {
         return GridView::widget([
            'dataProvider' => $this->dataProvider,
            'filterModel' => $this->filterModel,
            'columns' => [
                [
                    'attribute' => 'logo',
                    'value' => function (Film $film) {
                        return Html::img($film->logo);
                    },
                    'format' => 'raw',
                    'filter' => false,
                ],
                [
                    'attribute' => 'title',
                    'value' => function (Film $film) {
                        return Html::a($film->title, Url::to(['/film/'.$film->id]));
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
                    'format' => 'raw',
                    'filter' => false,
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
        ]);
    }
}