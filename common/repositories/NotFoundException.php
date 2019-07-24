<?php

namespace common\repositories;

use DomainException;
use Throwable;

class NotFoundException extends DomainException
{
    public function __construct($message = "Такая запись не найдена", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}