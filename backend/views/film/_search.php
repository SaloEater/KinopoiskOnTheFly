<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FilmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="film-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'logo') ?>

    <?= $form->field($model, 'producer_id') ?>

    <?= $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'publish_year') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'user_rating') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
