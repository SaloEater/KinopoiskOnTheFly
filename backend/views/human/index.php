<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HumanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Humans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="human-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Human', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'role_id',
            'birth_day',
            'birth_place',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
