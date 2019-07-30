<?php


namespace common\widgets;


use yii\base\Widget;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

class OneColumnViewWidget extends Widget
{
    public $models = [];

    public $column = [];

    public function run()
    {
        $content = GridView::widget([
            'dataProvider' => new ArrayDataProvider([
                'allModels' => $this->models
            ]),
            'columns' => [
                $this->column
            ],
            'layout' => "{items}\n{pager}",
            'options' => [
                'class' => 'grid-big-images'
            ]
        ]);

        return $content;
    }
}