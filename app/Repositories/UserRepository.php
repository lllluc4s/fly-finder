<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $model;

    /**
     * Construtor da classe.
     *
     * @param \App\Models\User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
