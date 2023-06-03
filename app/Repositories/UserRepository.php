<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $userModel)
    {
        parent::__construct($userModel);
    }

        public function countByEmail(string $email)
    {
        return $this->model->whereEmail($email)->count();
    }

}
