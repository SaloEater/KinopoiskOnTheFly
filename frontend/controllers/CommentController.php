<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29.07.2019
 * Time: 8:39
 */

namespace frontend\controllers;


use common\essences\Comment;
use Yii;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class CommentController extends Controller
{
    public function __construct(string $id, Module $module,
        
        array $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true
                    ],
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['post'],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $comment = new Comment();

        $post = Yii::$app->request->post();

        if ($comment->load($post) && $comment->save()) {
            Yii::$app->session->setFlash('success', 'Комментарий добавлен');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDelete($id)
    {
        /* @var $comment Comment*/
        $comment = $this->commentRepository->getById($id);

        if ($comment->user == Yii::$app->user->id) {

        }
        return $this->redirect(Yii::$app->request->referrer);
    }

}