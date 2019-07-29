<?php

use common\essences\Human;
use common\helpers\HumanHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\essences\Human */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="human-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_id')->dropDownList(HumanHelper::rolesArrayForDropdown()) ?>

    <?= $form->field($model, 'birth_day')->widget(\kartik\date\DatePicker::class,[
        'name' => 'День рождения',
        'value' => date('d-m-Y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Укажите дату'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ])->label(false) ?>

    <?= $form->field($model, 'birth_place')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
