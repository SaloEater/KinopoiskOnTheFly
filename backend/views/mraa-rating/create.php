<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\essences\MraaRating */

$this->title = 'Create Mraa Rating';
$this->params['breadcrumbs'][] = ['label' => 'Mraa Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mraa-rating-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
