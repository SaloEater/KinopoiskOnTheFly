<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\essences\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'table_id')->textInput() ?>

    <?= $form->field($model, 'page_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
