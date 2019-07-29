<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\essences\Film */
/* @var $genreList \common\essences\GenreList*/
/* @var $actorList \common\essences\ActorList*/

$this->title = 'Update Film: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="film-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'genreList' => $genreList,
        'actorList' => $actorList
    ]) ?>

</div>
