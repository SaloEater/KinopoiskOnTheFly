<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 28.07.2019
 * Time: 10:52
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class TooltipAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/tooltip.js'
    ];
}