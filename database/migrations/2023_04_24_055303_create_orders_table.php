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
        Schema::create(TableName::ORDER, function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->default(0)->index('user_id');
            $table->dateTime('datetime')->default(Carbon::now());
            $table->float('total_money')->default(0);
            $table->boolean('payment_status')->default(0);

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
        Schema::dropIfExists(TableName::ORDER);
    }
};
