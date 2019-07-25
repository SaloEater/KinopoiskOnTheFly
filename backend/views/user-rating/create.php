<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\essences\UserRating */

$this->title = 'Create User Rating';
$this->params['breadcrumbs'][] = ['label' => 'User Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rating-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
