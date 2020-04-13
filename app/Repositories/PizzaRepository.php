<?php

namespace App\Repositories;

use App\Pizza;

class PizzaRepository
{
    protected $model;

    public function __construct(Pizza $model)
    {
        $this->model = $model;
    }

    public function getAll(bool $active = false)
    {
        if ($active == true) {
            return $this->model
                ->where('active', true)
                ->with(['sizes', 'toppings'])
                ->get();
        }

        return $this->model
            ->with(['sizes', 'toppings'])
            ->get();
    }

    public function getAllByName(string $name)
    {
        return $this->model->where('name', $name)
            ->with(['sizes', 'toppings'])
            ->get();
    }
}
