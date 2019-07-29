<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29.07.2019
 * Time: 9:17
 */
/* @var $this yii\web\View */
/* @var $model common\essences\Comment */
/* @var $form yii\widgets\ActiveForm */
/* @var $action string*/

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<div class="comment-form">

    <?php $form = ActiveForm::begin([
        'action' => $action ?? null
    ]);
    //echo $form->field($model, 'id')->hiddenInput(['value' => $model->id])->label(false);
    echo $form->field($model, 'parent_id')->hiddenInput(['value' => $model->parent_id])->label(false);
    echo $form->field($model, 'table_id')->hiddenInput(['value' => $model->table_id])->label(false);
    echo $form->field($model, 'page_id')->hiddenInput(['value' => $model->page_id])->label(false);
    echo $form->field($model, 'user_id')->hiddenInput(['value' => $model->user_id])->label(false);
    ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 2])->label("Ваш текст") ?>

    <div class="form-group">
        <?= Html::submitButton('Написать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
