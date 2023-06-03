<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\TypeRepository;

class TypeService extends BaseService
{
    private TypeRepository $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
        parent::__construct($this->typeRepository);
    }
}
