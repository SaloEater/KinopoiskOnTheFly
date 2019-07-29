<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29.07.2019
 * Time: 9:47
 */

/* @var $title*/
/* @var $link*/
/* @var $model \common\essences\Comment*/
/* @var $action*/

use yii\bootstrap4\Modal;

Modal::begin([
    'title' => $title,
    'toggleButton' => [
        'label' => $link
    ],
    'bodyOptions' => [
        'style' => 'padding: 5px;'
    ]
]);
echo $this->render('@frontend/views/comment/_form', [
    'model' => $model,
    'action' => $action
]);
Modal::end();
?>


