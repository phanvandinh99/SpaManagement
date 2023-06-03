<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository extends BaseRepository
{
    public function __construct(Service $serviceModel)
    {
        parent::__construct($serviceModel);
    }
}
