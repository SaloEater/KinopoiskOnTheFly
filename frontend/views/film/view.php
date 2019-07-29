<?php

/* @var $this \yii\web\View*/
/* @var $film \common\essences\Film*/

use common\essences\Human;
use common\widgets\MPAAWidget;
use common\widgets\SimilarFilms;
use common\widgets\UserRatingWidget;
use frontend\assets\TooltipAsset;
use yii\helpers\Html;
use yii\helpers\Url;

\frontend\assets\CommonAsset::register($this);
$this->title = $film->title;
TooltipAsset::register($this);

?>


<?= Html::tag('div', $film->title, [
    'class' => 'display-3'
])?>
<div class="d-flex" >
    <div class="p-r-25 p-b-15">
        <?= Html::img($film->logo)?>
    </div>
    <?=\yii\widgets\DetailView::widget([
        'model' => $film,
        'attributes' => [
            [
                'label' => 'Режисер',
                'value' => Html::a($film->producer->name, Url::to(['/name/'.$film->producer->id])),
                'format' => 'raw'
            ],
            'country',
            'publish_year',
            'duration',
            [
                'attribute' => 'tagline',
                'contentOptions' => [
                        'style' => [
                                'color' => 'gray'
                        ]
                ]
            ],
            [
                'label' => 'Жанры',
                'value' => \common\widgets\FullGenreListWidget::widget([
                    'source' => $film
                ]),
                'format' => 'raw',
                'id' => 'genres'
            ],
            [
                'attribute' => 'mraa_rating',
                'value' => MPAAWidget::widget([
                        'id' => $film->mraa_rating
                ]),
                'format' => 'raw'
            ]
        ],
    ])?>
    <div class="p-l-25">
        <?=\yii\grid\GridView::widget([
            'dataProvider' => new \yii\data\ArrayDataProvider([
                'allModels' => $film->actors
            ]),
            'columns' => [
                [
                    'label' => 'Актеры',
                    'value' => function (Human $item) {
                        return Html::a($item->name, Url::to(['/name/'.$item->id]));
                    },
                    'format' => 'raw'
                ]
            ],
            'layout' => "{items}\n{pager}"
        ])?>
    </div>
</div>


<div class="w-75 ">
    <div class="border border-dark p-1">
        <?= $film->description?>
    </div>

    <table class="w-100 text-center">
        <tr>
            <td>
                Рейтинг кинокритиков:
                <div class="display-4 d-inline-block font-weight-bolder">
                    <?= $film->rating?>
                </div>
            </td>
            <td>
                Рейтинг пользователей:
                <div class="display-4 d-inline-block font-weight-bolder">
                    <?= $film->user_rating??"Нет оценок" ?>
                </div>
                </br>Ваша оценка:
                <div class="d-inline-block">
                    <?=  UserRatingWidget::widget([
                        'film' => $film
                    ])?>
                </div>
            </td>
        </tr>
    </table>

    <?=
    SimilarFilms::widget([
        'searchers' => [
            [
                'class' => \common\services\similar\GenresSearcher::class,
                'config' => [
                    'film' => $film,
                    'maximum' => 5
                ]
            ],
        ],
        'restrictors' => [
            [
                'class' => \common\services\similar\restrictors\PublishYearRestrictor::class,
                'config' => [
                    'year' => $film->publish_year
                ]
            ]
        ],
        'view' => SimilarFilms::$DISPLAY_FLEX
    ]);
    ?>

    <?=
        \common\widgets\CommentsWidget::widget([
            'table_id' => \common\essences\Comment::TABLE_FILM,
            'page_id' => $film->id,
        ])
    ?>
</div>


