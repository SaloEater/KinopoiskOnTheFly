<?php

namespace frontend\controllers;

use common\repositories\HumanRepository;
use yii\base\Module;
use yii\web\Controller;

class HumanController extends Controller
{
    private $humanRepository;

    public function __construct(string $id, Module $module,
        HumanRepository $humanRepository,
        array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->humanRepository = $humanRepository;
    }

    public function actionView($id)
    {
        $human = $this->humanRepository->getById($id);

        return $this->render('view', [
            'human' => $human,
        ]);
    }
}