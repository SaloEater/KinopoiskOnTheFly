<?php


namespace functional;


use common\fixtures\AwardFixture;
use common\fixtures\CommentFixture;
use common\fixtures\FilmFixture;
use common\fixtures\FilmsActorsFixture;
use common\fixtures\FilmsAwardsFixture;
use common\fixtures\FilmsGenresFixture;
use common\fixtures\GenreFixture;
use common\fixtures\HumanFixture;
use common\fixtures\MPAAFixture;
use common\fixtures\UserFixture;
use common\fixtures\UsersFavoriteFilmsFixture;
use frontend\tests\FunctionalTester;

class FilmsCest
{
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ],
            'award' => [
                'class' => AwardFixture::class,
                'dataFile' => codecept_data_dir() . 'award.php'
            ],
            'human' => [
                'class' => HumanFixture::class,
                'dataFile' => codecept_data_dir() . 'human.php'
            ],
            'film' => [
                'class' => FilmFixture::class,
                'dataFile' => codecept_data_dir() . 'film.php'
            ],
            'comment' => [
                'class' => CommentFixture::class,
                'dataFile' => codecept_data_dir() . 'comment.php'
            ],
            'genre' => [
                'class' => GenreFixture::class,
                'dataFile' => codecept_data_dir() . 'genre.php'
            ],
            'mraa_rating' => [
                'class' => MPAAFixture::class,
                'dataFile' => codecept_data_dir() . 'mpaa.php'
            ],
            'films_actors' => [
                'class' => FilmsActorsFixture::class,
                'dataFile' => codecept_data_dir() . 'films_actors.php'
            ],
            'films_awards' => [
                'class' => FilmsAwardsFixture::class,
                'dataFile' => codecept_data_dir() . 'films_awards.php'
            ],
            'films_genres' => [
                'class' => FilmsGenresFixture::class,
                'dataFile' => codecept_data_dir() . 'films_genres.php'
            ],
            'users_favorite_films' => [
                'class' => UsersFavoriteFilmsFixture::class,
                'dataFile' => codecept_data_dir() . 'fav_films.php'
            ]
        ];
    }

    public function checkFilms(FunctionalTester $I)
    {
        $I->amOnPage('/films');
        $I->see($I->grabFixture('film', 0)['title']);
        $I->see($I->grabFixture('genre', 0)['name']);
        $I->seeElement('td img');
    }

    public function checkFilm(FunctionalTester $I)
    {
        $I->amOnPage('/films');
        $I->click("td a[href*='film']");
        $I->see($I->grabFixture('film', 0)['title']);
        $I->seeElement('.detail-view td img');
        $I->see($I->grabFixture('film', 0)['rating']);
        $I->see($I->grabFixture('genre', 0)['name']);
        $I->see($I->grabFixture('human', 0)['name']);
        $I->see($I->grabFixture('human', 1)['name']);
        $I->seeElement('td img'); //award
        $I->see($I->grabFixture('comment', 0)['content']);
    }

    public function checkGenre(FunctionalTester $I)
    {
        $I->amOnPage('/films');
        $I->click("td a[href*='genre']");
        $I->see('Фильмы');
        $I->seeElement('table');
        $I->see($I->grabFixture('film', 0)['title']);
    }

    public function checkProducer(FunctionalTester $I)
    {
        $I->amOnPage('/films');
        $I->click("td a[href*='film']");
        $I->click("td a[href*='name']");
        $I->seeElement('td img'); //award
        $I->seeElement('td a'); // genres, films
        $I->see('Режисёр');
        $I->seeElement('img.d-block'); //Similar
    }

    public function checkActor(FunctionalTester $I)
    {
        $I->amOnPage('/films');
        $I->click("td a[href*='film']");
        $I->click(".grid-big-images td a[href*='name']");
        $I->seeElement('td img'); //award
        $I->seeElement('td a'); // genres, films
        $I->see('Актёр');
        $I->seeElement('img.d-block'); //Similar
    }
}