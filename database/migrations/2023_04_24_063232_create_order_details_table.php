<?php

use App\Shared\Constants\TableName;

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
        Schema::create(TableName::ORDER_DETAIL, function (Blueprint $table) {
            $table->id();

            $table->integer('product_id')->default(0)->index('product_id');
            $table->integer('order_id')->default(0)->index('order_id');
            $table->integer('quantity')->default(0);
            $table->integer('into_money')->default(0);

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
        Schema::dropIfExists(TableName::ORDER_DETAIL);
    }
};
