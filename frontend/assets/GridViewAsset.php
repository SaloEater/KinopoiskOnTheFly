<?php


namespace frontend\assets;


use yii\web\AssetBundle;

class GridViewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/gridview.css',
    ];
}