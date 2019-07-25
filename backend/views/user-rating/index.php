<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserRatingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Ratings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rating-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Rating', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
