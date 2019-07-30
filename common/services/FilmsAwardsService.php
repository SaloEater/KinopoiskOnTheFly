<?php

namespace common\services;

use common\essences\AwardList;
use common\essences\Film;
use common\essences\FilmsAwards;
use common\repositories\FilmsAwardsRepository;
use DomainException;

class FilmsAwardsService
{
    private $filmsAwardsRepository;

    public function __construct(FilmsAwardsRepository $filmsAwardsRepository)
    {
        $this->filmsAwardsRepository = $filmsAwardsRepository;
    }

    public function assignAwardsToFilm(AwardList $awardList, Film $film)
    {
        if (empty($awardList->awards)) {
            return;
        }
        foreach ($awardList->awards as $index=> $award_id) {
            $this->createLinkBetween($award_id, $film->id);
        }
    }

    public function createLinkBetween(int $award_id, int $film_id)
    {
        if (!($filmsAwards = $this->filmsAwardsRepository->findByIDs($award_id, $film_id))) {
            $filmsAwards = new FilmsAwards();
            $filmsAwards->film_id = $film_id;
            $filmsAwards->award_id = $award_id;
            $this->save($filmsAwards);
        }
    }

    public function save(FilmsAwards $filmsAwards)
    {
        if (!$filmsAwards->save()) {
            throw new DomainException('Ошибка при сохранении ' . $filmsAwards::className());
        }
    }
}