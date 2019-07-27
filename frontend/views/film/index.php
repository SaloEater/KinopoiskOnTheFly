<?php

use backend\models\FilmSearch;
use common\essences\Film;
use common\widgets\SmallGenreListWidget;
use common\widgets\SmallRatingWidget;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\View;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $filterModel backend\models\FilmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

\frontend\assets\GridViewAsset::register($this);
\frontend\assets\CommonAsset::register($this);

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
