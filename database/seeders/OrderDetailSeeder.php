<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Repositories\OrderDetailRepository;
use App\Shared\Constants\TableName;
use App\Shared\Helpers\JsonFileHelper;
use App\Shared\Constants\JsonFileName;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OrderDetailSeeder extends Seeder
{
    private OrderDetailRepository $orderDetailRepository;

    public function __construct(OrderDetailRepository $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Schema::hasTable(TableName::ORDER_DETAIL)) {
            return;
        }
        $this->initialOrderDetailsIfNotExists();
    }

    private function initialOrderDetailsIfNotExists()
    {
        $orderDetailsTemplate = JsonFileHelper::getDataJsonFile(JsonFileName::ORDER_DETAILS);

        $newOrderDetail = array_filter($orderDetailsTemplate, function ($orderDetailTemplate) {
            return !$this->orderDetailRepository->isExistsById($orderDetailTemplate['id']);
        });

        if (!empty($newOrderDetail)) {
            $this->orderDetailRepository->insert($newOrderDetail);
        }
    }
}
