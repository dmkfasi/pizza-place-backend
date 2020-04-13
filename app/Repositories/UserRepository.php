<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll($active = false)
    {
        if ($active === true) {
            return $this->model->where('active', true)->get();
        }

        return $this->model->all();
    }
}
