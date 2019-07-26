<?php
namespace common\services;

use common\essences\Film;
use common\essences\FilmsGenres;
use common\essences\GenreList;
use common\repositories\FilmsGenresRepository;

class FilmsGenresService
{
    private $filmsGenresRepository;

    public function __construct(FilmsGenresRepository $filmsGenresRepository)
    {
        $this->filmsGenresRepository = $filmsGenresRepository;
    }

    public function assignGenresToFilm(GenreList $genreList, Film $film)
    {
        foreach ($genreList->genres as $index=> $genre_id) {
            $this->createLinkBetween($genre_id, $film->id);
        }
    }

    public function createLinkBetween(int $genre_id, int $film_id)
    {
        if (!($filmsGenres = $this->filmsGenresRepository->findByIDs($genre_id, $film_id))) {
            $filmsGenres = new FilmsGenres();
            $filmsGenres->film_id = $film_id;
            $filmsGenres->genre_id = $genre_id;
            $this->save($filmsGenres);
        }
    }

    public function save(FilmsGenres $filmsGenres)
    {
        if (!$filmsGenres->save()) {
            throw new \DomainException('Ошибка при сохранении ' . $filmsGenres::className());
        }
    }

    public function from(Film $film)
    {
        $genreList = new GenreList();
        $genreList->genres = $film->genres;
        return $genreList;
    }

    public function getFilmsWith(array $genres)
    {
        $films = $this->filmsGenresRepository->findAllWithGenres($genres);

        return $films;
    }
}