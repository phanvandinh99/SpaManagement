<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Appointment;

class AppointmentRepository extends BaseRepository
{
    public function __construct(Appointment $appointmentModel)
    {
        parent::__construct($appointmentModel);
    }
}
