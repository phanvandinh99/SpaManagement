<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\InvoiceRepository;

class InvoiceService extends BaseService
{
    private InvoiceRepository $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
        parent::__construct($this->invoiceRepository);
    }
}
