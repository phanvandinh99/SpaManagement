<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AppointmentRepository;

class AppointmentServices extends BaseService
{
    private AppointmentRepository $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
        parent::__construct($this->appointmentRepository);
    }
}
