<?php
namespace frontend\controllers;

use common\repositories\UserRepository;
use common\services\UsersFavoriteFilmsService;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'favour' => ['post'],
                ],
            ],
        ];
    }

    private $userRepository;
    private $usersFavoriteFilmsService;

    public function __construct($id, $module,
        UserRepository $userRepository,
        UsersFavoriteFilmsService $usersFavoriteFilmsService,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->userRepository = $userRepository;
        $this->usersFavoriteFilmsService = $usersFavoriteFilmsService;
    }

    //For user himself
    public function actionIndex()
    {
        return $this->actionView(Yii::$app->user->id);
    }

    //For another user
    public function actionView($id)
    {
        $user = $this->userRepository->getById($id);

        return $this->render('view', [
            'user' => $user
        ]);
    }

    public function actionFavour()
    {
        $data = Yii::$app->request->post();
        $id = $data['id'];
        $this->usersFavoriteFilmsService->changeStateForFilm($id, Yii::$app->user->id);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [];
    }

}