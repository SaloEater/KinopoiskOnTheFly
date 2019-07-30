<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29.07.2019
 * Time: 8:39
 */

namespace frontend\controllers;



use common\essences\Comment;
use common\repositories\CommentRepository;
use common\services\CommentService;
use Yii;
use yii\base\Module;
use yii\filters\VerbFilter;
use yii\web\Controller;

class CommentController extends Controller
{
    private $commentRepository;
    private $commentService;

    public function __construct(string $id, Module $module,
        CommentRepository $commentRepository,
        CommentService $commentService,
        array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->commentRepository = $commentRepository;
        $this->commentService = $commentService;
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
                    'create' => ['post'],
                    'delete' => ['post'],
                    'update' => ['post'],
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

        if ($comment->user_id == Yii::$app->user->id) {
            $this->commentService->fakeDelete($comment);
            /*$this->commentRepository->delete($comment);*/
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUpdate($id)
    {
        /* @var $comment Comment*/
        $comment = $this->commentRepository->getById($id);

        $post = Yii::$app->request->post();

        if ($comment->load($post) && $comment->save()) {
            $this->commentRepository->save($comment);
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

}