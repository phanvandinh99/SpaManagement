<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Repositories\ServiceRepository;
use App\Shared\Constants\TableName;
use App\Shared\Helpers\JsonFileHelper;
use App\Shared\Constants\JsonFileName;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ServiceSeeder extends Seeder
{
    private ServiceRepository $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Schema::hasTable(TableName::SERVICE)) {
            return;
        }
        $this->initialServicesIfNotExists();
    }

    private function initialServicesIfNotExists()
    {
        $servicesTemplate = JsonFileHelper::getDataJsonFile(JsonFileName::SERVICES);

        $newService = array_filter($servicesTemplate, function ($serviceTemplate) {
            return !$this->serviceRepository->isExistsById($serviceTemplate['id']);
        });

        if (!empty($newService)) {
            $this->serviceRepository->insert($newService);
        }
    }
}
