<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository extends BaseRepository
{
    public function __construct(Invoice $invoiceModel)
    {
        parent::__construct($invoiceModel);
    }
}
