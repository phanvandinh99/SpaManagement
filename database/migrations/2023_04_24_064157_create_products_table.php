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
        Schema::create(TableName::PRODUCT, function (Blueprint $table) {
            $table->id();

            $table->integer('type_id')->default(0)->index('type_id');
            $table->string('img')->default('');
            $table->string('name')->default('');
            $table->string('description')->default('');
            $table->float('price')->default(0);
            $table->float('total_amount')->default(0);

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
        Schema::dropIfExists(TableName::PRODUCT);
    }
};
