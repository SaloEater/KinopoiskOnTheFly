<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 28.07.2019
 * Time: 13:49
 */

namespace common\services;


use common\essences\ActorList;
use common\essences\Film;
use common\essences\FilmsActors;
use common\repositories\FilmsActorsRepository;
use DomainException;

class FilmsActorsService
{
    private $filmsActorsRepository;

    public function __construct(FilmsActorsRepository $filmsActorsRepository)
    {
        $this->filmsActorsRepository = $filmsActorsRepository;
    }

    public function assignActorsToFilm(ActorList $actorList, Film $film)
    {
        if (empty($actorList->actors)) {
            return;
        }
        foreach ($actorList->actors as $index=> $actor_id) {
            $this->createLinkBetween($actor_id, $film->id);
        }
    }

    public function createLinkBetween(int $actor_id, int $film_id)
    {
        if (!($filmsActors = $this->filmsActorsRepository->findByIDs($actor_id, $film_id))) {
            $filmsActors = new FilmsActors();
            $filmsActors->film_id = $film_id;
            $filmsActors->actor_id = $actor_id;
            $this->save($filmsActors);
        }
    }

    public function save(FilmsActors $filmsActors)
    {
        if (!$filmsActors->save()) {
            throw new DomainException('Ошибка при сохранении ' . $filmsActors::className());
        }
    }
}