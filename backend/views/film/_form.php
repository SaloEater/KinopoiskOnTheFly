<?php

use common\essences\ActorList;
use common\essences\AwardList;
use common\essences\GenreList;
use common\helpers\ActorHelper;
use common\helpers\AwardHelper;
use common\helpers\FilmHelper;
use common\helpers\GenreHelper;
use common\services\ProducerService;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\essences\Film */
/* @var $form yii\widgets\ActiveForm */
/* @var $genreList GenreList*/
/* @var $actorList ActorList*/
/* @var $awardList AwardList*/
?>

<div class="film-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea()?>

    <?= $form->field($model, 'producer_id')
        ->dropDownList(Yii::createObject(ProducerService::class)->prepareArrayForDropdown()) ?>

    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publish_year')->textInput() ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'tagline')->textInput() ?>

    <?= $form->field($model, 'trailer_url')->textInput() ?>

    <?= $form->field($model, 'user_rating')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mraa_rating')
        ->dropDownList(FilmHelper::mraaArrayForDropdown()) ?>

    <?=
        $form->field($genreList, 'genres')
            ->checkboxList(GenreHelper::prepareArrayForDropdown())->label('Выберите жанры');
    ?>

    <?=
        $form->field($actorList, 'actors')
            ->checkboxList(ActorHelper::prepareArrayForDropdown())->label('Выберите актеров');
    ?>

    <?=
        $form->field($awardList, 'awards')
            ->checkboxList(AwardHelper::prepareArrayForDropdown())->label('Выберите награды');
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
