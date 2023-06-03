<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\OrderDetail;

class OrderDetailRepository extends BaseRepository
{
    public function __construct(OrderDetail $orderDetailModel)
    {
        parent::__construct($orderDetailModel);
    }
}
