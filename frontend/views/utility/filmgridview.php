<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 20:08
 */

/* @var $filterModel backend\models\FilmSearch */
/* @var $dataProvider yii\data\BaseDataProvider */

use yii\widgets\Pjax; ?>

<?= \common\widgets\FilmGridViewWidget::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $filterModel
]);
?>

