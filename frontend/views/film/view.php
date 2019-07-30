<?php

/* @var $this View*/
/* @var $film Film*/

use common\essences\Award;
use common\essences\Comment;
use common\essences\Film;
use common\essences\Human;
use common\services\similar\GenresSearcher;
use common\services\similar\restrictors\PublishYearRestrictor;
use common\widgets\CommentsWidget;
use common\widgets\FavoriteIconWidget;
use common\widgets\FullGenreListWidget;
use common\widgets\MPAAWidget;
use common\widgets\OneColumnViewWidget;
use common\widgets\SimilarFilms;
use common\widgets\UserRatingWidget;
use frontend\assets\CommonAsset;
use frontend\assets\TooltipAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

CommonAsset::register($this);
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
    <div>
        <?= DetailView::widget([
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
                    'value' => FullGenreListWidget::widget([
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
        <div class="d-flex justify-content-between">
            <?= Html::a('Трейлер', $film->trailer_url, [
                'class' => 'btn btn-secondary'
            ])?>
            <div>
                <?php
                    Pjax::begin([
                        'id' => 'favorite',
                        'submitEvent' => 'click'
                    ]);
                ?>
                <?= FavoriteIconWidget::widget([
                    'film_id' => $film->id
                ]);
                ?>
                <?php
                    Pjax::end();
                ?>
            </div>

        </div>
    </div>
    <div class="p-l-25">

        <?=OneColumnViewWidget::widget([
            'models' => $film->actors,
            'column' => [
                'label' => 'Актеры',
                'value' => function (Human $item) {
                    return Html::a($item->name, Url::to(['/name/'.$item->id]));
                },
                'format' => 'raw'
            ]
        ])?>

        <?=OneColumnViewWidget::widget([
            'models' => $film->awards,
            'column' => [
                'label' => 'Награды',
                'value' => function (Award $item) {
                    return Html::img($item->icon, [
                        'title' => $item->name,
                        'data-toggle' => 'tooltip',
                    ]);
                },
                'format' => 'raw'
            ]
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
                'class' => GenresSearcher::class,
                'config' => [
                    'film' => $film,
                    'maximum' => 5
                ]
            ],
        ],
        'restrictors' => [
            [
                'class' => PublishYearRestrictor::class,
                'config' => [
                    'year' => $film->publish_year
                ]
            ]
        ],
        'view' => SimilarFilms::$DISPLAY_FLEX
    ]);
    ?>

    <?=
        CommentsWidget::widget([
            'table_id' => Comment::TABLE_FILM,
            'page_id' => $film->id,
        ])
    ?>
</div>


