<?php

/* @var $this \yii\web\View*/
/* @var $human \common\essences\Human*/

\frontend\assets\CommonAsset::register($this);

use common\essences\Human;
use common\widgets\SimilarFilms;
use yii\helpers\Html;
$this->title = $human->name;
?>

<?= Html::tag('div', $human->name, [
    'class' => 'display-3'
])?>
<div class="d-flex" >
    <div class="p-r-25 p-b-15">
        <?= 'Здесь будет лого'?>
    </div>
    <?=\yii\widgets\DetailView::widget([
        'model' => $human,
        'attributes' => [
            [
                'label' => 'Профессия',
                'value' => $human->getRoleName()
            ],
            [
                'attribute' => 'birth_day',
                'value' => function(Human $item) {
                    return \common\helpers\DateHelper::dateString($item->birth_day);
                }
            ],
            'birth_place',
        ],
    ])?>

</div>

<?=
SimilarFilms::widget([
    'searchers' => [
        [
            'class' => \common\services\similar\HumanSearcher::class,
            'config' => [
                'human' => $human
            ]
        ],
    ],
    'title' => 'Фильмы',
    'display' => SimilarFilms::$DISPLAY_GRID
]);
?>