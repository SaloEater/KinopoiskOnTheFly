<?php

/* @var $this \yii\web\View*/
/* @var $human \common\essences\Human*/

\frontend\assets\CommonAsset::register($this);

use common\services\FilmService;
use common\widgets\SimilarFilms;
use yii\helpers\Html;
$this->title = $human->name;

\frontend\assets\CommonAsset::register($this);

?>

<?= Html::tag('div', $human->name, [
    'class' => 'display-3'
])?>
<div class="d-flex" >
    <div class="p-r-25 p-b-15">
        <?= Html::img($human->logo)?>
    </div>
    <?=\yii\widgets\DetailView::widget([
        'model' => $human,
        'attributes' => [
            [
                'label' => 'Карьера',
                'value' => $human->getRoleName()
            ],
            [
                'label' => 'Список жанров',
                'value' => \common\widgets\FullGenreListWidget::widget([
                    'source' => $human
                ]),
                'format' => 'raw'
            ],
            [
                'label' => 'Список фильмов',
                'value' => \common\widgets\OnelineFilmsListWidget::widget([
                    'films' => Yii::createObject(FilmService::class)->getByHuman($human)
                ]),
                'format' => 'raw'
            ],
            [
                'attribute' => 'birth_day',
                'value' => \common\helpers\DateHelper::dateString($human->birth_day)
            ],
            'birth_place',
        ],
    ])?>

</div>

<?=
SimilarFilms::widget([
    'searchers' => [
        [
            'class' => \common\services\similar\BestFilmsSearcher::class,
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