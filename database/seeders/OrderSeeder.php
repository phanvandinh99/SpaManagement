<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Repositories\OrderRepository;
use App\Shared\Constants\TableName;
use App\Shared\Helpers\JsonFileHelper;
use App\Shared\Constants\JsonFileName;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OrderSeeder extends Seeder
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Schema::hasTable(TableName::ORDER)) {
            return;
        }
        $this->initialOrdersIfNotExists();
    }

    private function initialOrdersIfNotExists()
    {
        $ordersTemplate = JsonFileHelper::getDataJsonFile(JsonFileName::ORDER);

        $newOrder = array_filter($ordersTemplate, function ($orderTemplate) {
            return !$this->orderRepository->isExistsById($orderTemplate['id']);
        });

        if (!empty($newOrder)) {
            $this->orderRepository->insert($newOrder);
        }
    }
}
