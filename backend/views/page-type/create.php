<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\essences\PageType */

$this->title = 'Create Page Type';
$this->params['breadcrumbs'][] = ['label' => 'Page Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
