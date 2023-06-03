<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Repositories\InvoiceRepository;
use App\Shared\Constants\TableName;
use App\Shared\Helpers\JsonFileHelper;
use App\Shared\Constants\JsonFileName;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class InvoicesSeeder extends Seeder
{
    private InvoiceRepository $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Schema::hasTable(TableName::INVOICE)) {
            return;
        }
        $this->initialInvoicesIfNotExists();
    }

    private function initialInvoicesIfNotExists()
    {
        $invoicesTemplate = JsonFileHelper::getDataJsonFile(JsonFileName::INVOICES);

        $newInvoice = array_filter($invoicesTemplate, function ($invoiceTemplate) {
            return !$this->invoiceRepository->isExistsById($invoiceTemplate['id']);
        });

        if (!empty($newInvoice)) {
            $this->invoiceRepository->insert($newInvoice);
        }
    }
}
