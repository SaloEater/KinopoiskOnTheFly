<?php

namespace frontend\controllers;

use backend\models\FilmSearch;
use common\essences\Film;
use common\repositories\FilmRepository;
use common\repositories\GenreRepository;
use common\services\similar\GenreBuilder;
use common\services\similar\GenreSearcher;
use common\services\similar\NameBuilder;
use common\services\similar\ProducerBuilder;
use Yii;
use yii\data\ActiveDataProvider;

class FilmController extends \yii\web\Controller
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