<?php


namespace frontend\assets;


use yii\web\AssetBundle;

class CommonAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/common.css',
    ];
}