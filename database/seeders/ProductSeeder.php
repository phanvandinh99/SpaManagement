<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Repositories\ProductRepository;
use App\Shared\Constants\TableName;
use App\Shared\Helpers\JsonFileHelper;
use App\Shared\Constants\JsonFileName;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Schema::hasTable(TableName::PRODUCT)) {
            return;
        }
        $this->initialProductsIfNotExists();
    }

    private function initialProductsIfNotExists()
    {
        $productsTemplate = JsonFileHelper::getDataJsonFile(JsonFileName::PRODUCTS);

        $newProduct = array_filter($productsTemplate, function ($productTemplate) {
            return !$this->productRepository->isExistsById($productTemplate['id']);
        });

        if (!empty($newProduct)) {
            $this->productRepository->insert($newProduct);
        }
    }
}
