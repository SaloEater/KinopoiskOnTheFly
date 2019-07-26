<?php

/* @var $this \yii\web\View*/
/* @var $film \common\essences\Film*/

use common\widgets\SimilarFilms;
use yii\helpers\Html;
use yii\helpers\Url;

\frontend\assets\CommonAsset::register($this);
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
                'label' => 'Жанры',
                'value' => \common\widgets\FullGenreListWidget::widget([
                    'film' => $film
                ]),
                'format' => 'raw',
                'id' => 'genres'
            ]
        ],
    ])?>

    <?=
        SimilarFilms::widger([
            'builders' => [

            ]
        ]);
    ?>

</div>
