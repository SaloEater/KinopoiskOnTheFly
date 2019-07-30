<?php

namespace backend\controllers;

use common\essences\ActorList;
use common\essences\AwardList;
use common\essences\GenreList;
use common\services\FilmsActorsService;
use common\services\FilmsAwardsService;
use common\services\FilmsGenresService;
use Yii;
use common\essences\Film;
use backend\models\FilmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FilmController implements the CRUD actions for Film model.
 */
class FilmController extends Controller
{

    private $filmsGenresService;
    private $filmsActorsService;
    private $filmsAwardsService;


    public function __construct($id, $module,
        FilmsGenresService $filmsGenresService,
        FilmsActorsService $filmsActorsService,
        FilmsAwardsService $filmsAwardsService,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->filmsGenresService = $filmsGenresService;
        $this->filmsActorsService = $filmsActorsService;
        $this->filmsAwardsService = $filmsAwardsService;

    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Film models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Film model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Film model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $film = new Film();
        $genreList = new GenreList();
        $actorList = new ActorList();
        $awardList = new AwardList();

        if ($film->load(Yii::$app->request->post())
            && $genreList->load(Yii::$app->request->post())
            && $actorList->load(Yii::$app->request->post())
            && $awardList->load(Yii::$app->request->post())
            && $film->save()) {
            $this->filmsGenresService->assignGenresToFilm($genreList, $film);
            $this->filmsActorsService->assignActorsToFilm($actorList, $film);
            $this->filmsAwardsService->assignAwardsToFilm($awardList, $film);
            //return $this->redirect(['view', 'id' => $film->id]);
            return $this->refresh();
        }

        return $this->render('create', [
            'model' => $film,
            'genreList' => $genreList,
            'actorList' => $actorList,
            'awardList' => $awardList
        ]);
    }

    /**
     * Updates an existing Film model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $film = $this->findModel($id);
        $genreList = GenreList::fromFilm($film);
        $actorList = ActorList::fromFilm($film);
        $awardList = AwardList::fromFilm($film);

        if ($film->load(Yii::$app->request->post())
            && $genreList->load(Yii::$app->request->post())
            && $actorList->load(Yii::$app->request->post())
            && $awardList->load(Yii::$app->request->post())
            && $film->save()) {
            $this->filmsGenresService->assignGenresToFilm($genreList, $film);
            $this->filmsActorsService->assignActorsToFilm($actorList, $film);
            $this->filmsAwardsService->assignAwardsToFilm($awardList, $film);
            //return $this->redirect(['view', 'id' => $film->id]);
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $film,
            'genreList' => $genreList,
            'actorList' => $actorList,
            'awardList' => $awardList
        ]);
    }

    /**
     * Deletes an existing Film model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Film model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Film the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Film::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
