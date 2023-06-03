<?php

declare(strict_types=1);

namespace App\Shared\Constants;

class Role
{
    const ADMIN = 'ADMIN';

    const USER = 'USER';

    // 'role name' intended for accepting all role
    const ALL = 'ALL';

    const AUTH_ADMIN = 'role:' . Role::ADMIN;

    const AUTH_USER = 'role:' . Role::USER;

    const AUTH_ALL = 'role:' . Role::ALL;

    const ALL_ROLE = [Role::ADMIN, Role::USER];
}