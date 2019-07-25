<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\essences\PageType */

$this->title = 'Update Page Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Page Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
