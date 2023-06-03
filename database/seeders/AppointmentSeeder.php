<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Repositories\AppointmentRepository;
use App\Shared\Constants\TableName;
use App\Shared\Helpers\JsonFileHelper;
use App\Shared\Constants\JsonFileName;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AppointmentSeeder extends Seeder
{
    private AppointmentRepository $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Schema::hasTable(TableName::APPOINTMENT)) {
            return;
        }
        $this->initialAppointmentsIfNotExists();
    }

    private function initialAppointmentsIfNotExists()
    {
        $appointmentsTemplate = JsonFileHelper::getDataJsonFile(JsonFileName::APPOINTMENTS);

        $newAppointment = array_filter($appointmentsTemplate, function ($appointmentTemplate) {
            return !$this->appointmentRepository->isExistsById($appointmentTemplate['id']);
        });

        if (!empty($newAppointment)) {
            $this->appointmentRepository->insert($newAppointment);
        }
    }
}
