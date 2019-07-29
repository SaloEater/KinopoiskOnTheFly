<?php
namespace frontend\controllers;

use common\repositories\UserRepository;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class ProfileController extends Controller
{

    private $userRepository;

    public function __construct($id, $module,
        UserRepository $userRepository,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->userRepository = $userRepository;
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'index' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    //For user himself
    public function actionIndex()
    {
        return $this->actionView(\Yii::$app->user->id);
    }

    //For another user
    public function actionView($id)
    {
        $user = $this->userRepository->getById($id);

        return $this->render('view', [
            'user' => $user
        ]);
    }

}