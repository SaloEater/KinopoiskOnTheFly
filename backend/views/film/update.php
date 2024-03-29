<?php

use common\essences\ActorList;
use common\essences\AwardList;
use common\essences\GenreList;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\essences\Film */
/* @var $genreList GenreList*/
/* @var $actorList ActorList*/
/* @var $awardList AwardList*/

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
        'actorList' => $actorList,
        'awardList' => $awardList
    ]) ?>

</div>
