<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends BaseService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        parent::__construct($this->userRepository);
    }
}
