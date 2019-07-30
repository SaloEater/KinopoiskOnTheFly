<?php  //[STAMP] 408f67efbf1e9892e3c9f3276fb3ccf2
namespace common\tests\_generated;

// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile

use Codeception\Scenario;
use Codeception\Step\Action;

trait UnitTesterActions
{
    /**
     * @return Scenario
     */
    abstract protected function getScenario();


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Creates and loads fixtures from a config.
     * Signature is the same as for `fixtures()` method of `yii\test\FixtureTrait`
     *
     * ```php
     * <?php
     * $I->haveFixtures([
     *     'posts' => PostsFixture::className(),
     *     'user' => [
     *         'class' => UserFixture::className(),
     *         'dataFile' => '@tests/_data/models/user.php',
     *      ],
     * ]);
     * ```
     *
     * Note: if you need to load fixtures before the test (probably before the cleanup transaction is started;
     * `cleanup` options is `true` by default), you can specify fixtures with _fixtures method of a testcase
     * ```php
     * <?php
     * // inside Cest file or Codeception\TestCase\Unit
     * public function _fixtures(){
     *     return [
     *         'user' => [
     *             'class' => UserFixture::className(),
     *             'dataFile' => codecept_data_dir() . 'user.php'
     *         ]
     *     ];
     * }
     * ```
     * instead of defining `haveFixtures` in Cest `_before`
     *
     * @param $fixtures
     * @return mixed|null
     * @throws \Exception
     * @part fixtures
     * @see \Codeception\Module\Yii2::haveFixtures()
     */
    public function haveFixtures($fixtures) {
        return $this->getScenario()->runStep(new Action('haveFixtures', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Returns all loaded fixtures.
     * Array of fixture instances
     *
     * @part fixtures
     * @return array
     * @throws \Exception
     * @see \Codeception\Module\Yii2::grabFixtures()
     */
    public function grabFixtures() {
        return $this->getScenario()->runStep(new Action('grabFixtures', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Gets a fixture by name.
     * Returns a Fixture instance. If a fixture is an instance of `\yii\test\BaseActiveFixture` a second parameter
     * can be used to return a specific model:
     *
     * ```php
     * <?php
     * $I->haveFixtures(['users' => UserFixture::className()]);
     *
     * $users = $I->grabFixture('users');
     *
     * // get first user by key, if a fixture is instance of ActiveFixture
     * $user = $I->grabFixture('users', 'user1');
     * ```
     *
     * @param $name
     * @param null $index
     * @return mixed
     * @throws \Exception
     * @part fixtures
     * @see \Codeception\Module\Yii2::grabFixture()
     */
    public function grabFixture($name, $index = null) {
        return $this->getScenario()->runStep(new Action('grabFixture', func_get_args()));
    }
}
