<?php

use frontend\assets\CommonAsset;
use frontend\assets\GridViewAsset;

/* @var $this yii\web\View */
/* @var $filterModel backend\models\FilmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

GridViewAsset::register($this);
CommonAsset::register($this);

$this->title = 'Фильмы';
?>

<div class="text-view">
    <div class="display-3 text-center">Список фильмов</div>
    <?= $this->render('/utility/filmgridview', [
        'dataProvider' => $dataProvider,
        'filterModel' => $filterModel,
        'id' => 'film-index'
    ])?>
</div>
