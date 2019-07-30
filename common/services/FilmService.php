<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 28.07.2019
 * Time: 12:12
 */

namespace common\services;


use common\essences\Human;
use common\repositories\FilmRepository;
use InvalidArgumentException;

class FilmService
{
    private $films;

    public function __construct(FilmRepository $films)
    {
        $this->films = $films;
    }

    public function getByHuman(Human $human)
    {
        switch ($human->role_id) {
            case ($human::ROLE_PRODUCER): {
                $films = $human->producedFilms;
                break;
            }
            case ($human::ROLE_ACTOR): {
                $films = $human->films;
                break;
            }
            default: {
                throw new InvalidArgumentException('Не указана роль');
                break;
            }
        }
        return $films;
    }

}