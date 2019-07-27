<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 19:13
 */

namespace frontend\controllers;


use common\repositories\GenreRepository;
use yii\base\Module;
use yii\web\Controller;

class GenreController extends Controller
{

    private $genreRepository;

    public function __construct(string $id, Module $module,
        GenreRepository $genreRepository,
        array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->genreRepository = $genreRepository;
    }

    public function actionView($id)
    {
        $genre = $this->genreRepository->getById($id);

        return $this->render('view', [
            'genre' => $genre,
        ]);
    }

}