<?php

namespace common\widgets;

use common\services\UsersFavoriteFilmsService;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class FavoriteIconWidget extends Widget
{

    public $film_id;

    public function run()
    {
        $content = '';

        if (!Yii::$app->user->isGuest) {
            if (Yii::createObject(UsersFavoriteFilmsService::class)->isExist($this->film_id, Yii::$app->user->id)) {
                $initialIcon = 'fa-heart';
            } else {
                $initialIcon = 'fa-heart-o';
            }
            $content .= Html::tag('span', '', [
               'class' => 'ml-4 fa-2x fa '.$initialIcon,
                'style' => 'cursor: pointer',
                'data-toggle' => 'tooltip',
                'title' => 'Избранное'
            ]);
        }

        $this->registerScript();

        return $content;
    }

    public function registerScript()
    {
        $id = $this->film_id;
        $token = Yii::$app->request->getCsrfToken();
        $js = <<<JS
$("#favorite").click(function(){
            $.ajax({url: "/profile/favour", 
                type: "post",
                data: {
                    id: "$id",
                     _csrf : "$token"
                },
                success: function() {
                    $("#favorite > span").toggleClass("fa-heart-o fa-heart");
                },
                error: function(xhr) {
                    alert("An error occured: " + xhr.status + " " + xhr.statusText);
                }            
            });
        });
JS;
        $this->view->registerJs($js);
    }

}