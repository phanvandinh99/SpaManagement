<?php

use App\Shared\Constants\TableName;

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TableName::INVOICE, function (Blueprint $table) {
            $table->id();

            $table->integer('appointment_id')->default(0)->index('appointment_id');
            $table->dateTime('payment_date')->default(Carbon::now());
            $table->float('price')->default(0);
            $table->integer('admin_confirm')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(TableName::INVOICE);
    }
};
