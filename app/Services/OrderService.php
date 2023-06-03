<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService extends BaseService
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        parent::__construct($this->orderRepository);
    }
}
