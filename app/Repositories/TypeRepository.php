<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Type;

class TypeRepository extends BaseRepository
{
    public function __construct(Type $typeModel)
    {
        parent::__construct($typeModel);
    }
}
