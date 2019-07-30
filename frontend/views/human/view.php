<?php

/* @var $this View*/
/* @var $human Human*/

CommonAsset::register($this);

use common\essences\Award;
use common\essences\Comment;
use common\essences\Human;
use common\helpers\DateHelper;
use common\helpers\HumanHelper;
use common\services\FilmService;
use common\services\similar\BestFilmsSearcher;
use common\widgets\CommentsWidget;
use common\widgets\FullGenreListWidget;
use common\widgets\OneColumnViewWidget;
use common\widgets\OnelineFilmsListWidget;
use common\widgets\SimilarFilms;
use frontend\assets\CommonAsset;
use frontend\assets\TooltipAsset;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

$this->title = $human->name;

TooltipAsset::register($this);

?>

<?= Html::tag('div', $human->name, [
    'class' => 'display-3'
])?>
<div class="d-flex" >
    <div class="p-r-25 p-b-15">
        <?= Html::img($human->logo)?>
    </div>
    <?= DetailView::widget([
        'model' => $human,
        'attributes' => [
            [
                'label' => 'Карьера',
                'value' => $human->getRoleName()
            ],
            [
                'label' => 'Список жанров',
                'value' => FullGenreListWidget::widget([
                    'source' => $human
                ]),
                'format' => 'raw'
            ],
            [
                'label' => 'Список фильмов',
                'value' => OnelineFilmsListWidget::widget([
                    'films' => Yii::createObject(FilmService::class)->getByHuman($human)
                ]),
                'format' => 'raw'
            ],
            [
                'attribute' => 'birth_day',
                'value' => DateHelper::dateString($human->birth_day)
            ],
            'birth_place',
        ],
    ])?>
    <div class="p-l-25">
    <?=OneColumnViewWidget::widget([
        'models' => HumanHelper::findAwardsFor($human),
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

<?=
SimilarFilms::widget([
    'searchers' => [
        [
            'class' => BestFilmsSearcher::class,
            'config' => [
                'human' => $human,
                'maximum' => 5
            ]
        ],
    ],
    'title' => 'Лучшие фильмы',
    'display' => SimilarFilms::$DISPLAY_FLEX
]);
?>

<?=
CommentsWidget::widget([
    'table_id' => Comment::TABLE_HUMAN,
    'page_id' => $human->id,
])
?>

