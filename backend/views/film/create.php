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

$this->title = 'Create Film';
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'genreList' => $genreList,
        'actorList' => $actorList,
        'awardList' => $awardList
    ]) ?>

</div>
