<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ServiceRepository;

class ServiceService extends BaseService
{
    private ServiceRepository $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
        parent::__construct($this->serviceRepository);
    }
}
