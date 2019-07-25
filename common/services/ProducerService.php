<?php

namespace common\services;

use common\essences\Human;
use common\repositories\ProducerRepository;

class ProducerService
{
    private $producers;

    public function __construct(ProducerRepository $producers)
    {
        $this->producers = $producers;
    }

    public function prepareArrayForDropdown()
    {
        return array_reduce($this->producers->findAll(), function($carry, Human $producer) {
            $carry[$producer->id] = $producer->name;
            return $carry;
        }, []);
    }
}