<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\essences\MraaRating */

$this->title = 'Update Mraa Rating: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mraa Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mraa-rating-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
