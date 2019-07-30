<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29.07.2019
 * Time: 9:47
 */

/* @var $title*/
/* @var $link*/
/* @var $model Comment*/
/* @var $action*/

use common\essences\Comment;
use yii\bootstrap4\Modal;

Modal::begin([
    'title' => $title,
    'toggleButton' => [
        'label' => $link
    ],
    'bodyOptions' => [
        'class' => 'p-2 pl-5 pr-5'
    ]
]);
echo $this->render('@frontend/views/comment/_form', [
    'model' => $model,
    'action' => $action
]);
Modal::end();



