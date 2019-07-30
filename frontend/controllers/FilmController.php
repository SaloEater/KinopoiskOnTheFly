<?php

namespace frontend\controllers;

use backend\models\FilmSearch;
use common\repositories\FilmRepository;
use Yii;
use yii\web\Controller;

class FilmController extends Controller
{

    private $filmRepository;

    public function __construct($id, $module,
        FilmRepository $filmRepository,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->filmRepository = $filmRepository;
    }

    public function actionIndex()
    {
        $searchModel = new FilmSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'filterModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $film = $this->filmRepository->getById($id);

        return $this->render('view', [
            'film' => $film,
        ]);
    }



}