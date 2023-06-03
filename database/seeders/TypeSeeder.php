<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Repositories\TypeRepository;
use App\Shared\Constants\TableName;
use App\Shared\Helpers\JsonFileHelper;
use App\Shared\Constants\JsonFileName;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    private TypeRepository $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Schema::hasTable(TableName::TYPE)) {
            return;
        }
        $this->initialTypesIfNotExists();
    }

    private function initialTypesIfNotExists()
    {
        $typesTemplate = JsonFileHelper::getDataJsonFile(JsonFileName::TYPES);

        $newType = array_filter($typesTemplate, function ($typeTemplate) {
            return !$this->typeRepository->isExistsById($typeTemplate['id']);
        });

        if (!empty($newType)) {
            $this->typeRepository->insert($newType);
        }
    }
}
