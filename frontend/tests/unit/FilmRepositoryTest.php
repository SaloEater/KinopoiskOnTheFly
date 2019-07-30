<?php


namespace unit;


use Codeception\Test\Unit;
use common\essences\Film;
use common\essences\Human;
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
use common\repositories\FilmRepository;
use frontend\tests\UnitTester;
use Yii;

class FilmRepositoryTest extends Unit
{
    /* @var UnitTester*/
    protected $tester;

    protected $filmRepository;

    protected function _before()
    {
        $this->tester->haveFixtures([
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
        ]);
        $this->filmRepository = Yii::createObject(FilmRepository::class);
    }

    public function testGetById()
    {
        $film = Film::findOne(['title' => $this->tester->grabFixture('film', 0)['title']]);
        $title = $film->title;
        $this->assertEquals($title, $this->filmRepository->getById($film->id)->title);
    }

    public function testFindByIds()
    {
        $film_1 = Film::findOne(['title' => $this->tester->grabFixture('film', 0)['title']]);
        $film_2 = Film::findOne(['title' => $this->tester->grabFixture('film', 1)['title']]);

        $films = $this->filmRepository->findByIDs([$film_1->id, $film_2->id]);

        $this->assertEquals($film_1->title, $films[0]->title);
        $this->assertEquals($film_2->title, $films[1]->title);

        $this->assertEmpty($this->filmRepository->findByIDs([0]));
    }

    public function testGetTopIdsByProducer()
    {
        $film_1 = Film::findOne(['title' => $this->tester->grabFixture('film', 0)['title']]);
        $film_2 = Film::findOne(['title' => $this->tester->grabFixture('film', 1)['title']]);
        $producer = Human::findOne(['role_id' => Human::ROLE_PRODUCER]);
        $idArray = $this->filmRepository->getTopIDsByHuman($producer, 1);
        $this->assertNotEmpty($idArray);
        $this->assertCount(1, $idArray);
        $idArray = $this->filmRepository->getTopIDsByHuman($producer, 2);
        $this->assertNotEmpty($idArray);
        $this->assertCount(2, $idArray);

        $this->assertEquals($film_1->id, $idArray[0]);
        $this->assertEquals($film_2->id, $idArray[1]);
    }

    public function testGetTopIDsByActor()
    {
        $film_1 = Film::findOne(['title' => $this->tester->grabFixture('film', 0)['title']]);
        $film_2 = Film::findOne(['title' => $this->tester->grabFixture('film', 1)['title']]);

        $actor = Human::findOne(['role_id' => Human::ROLE_ACTOR]);
        $idArray = $this->filmRepository->getTopIDsByHuman($actor, 1);
        $this->assertNotEmpty($idArray);
        $this->assertCount(1, $idArray);
        $idArray = $this->filmRepository->getTopIDsByHuman($actor, 2);
        $this->assertNotEmpty($idArray);
        $this->assertCount(2, $idArray);

        $this->assertEquals($film_1->id, $idArray[0]);
        $this->assertEquals($film_2->id, $idArray[1]);
    }
}