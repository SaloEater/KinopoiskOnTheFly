<?php

namespace frontend\controllers;

use backend\models\FilmSearch;
use Yii;
use yii\data\ActiveDataProvider;

class FilmController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $searchModel = new FilmSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'filterModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($slug)
    {
        
    }

}