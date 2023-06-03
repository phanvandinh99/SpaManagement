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
        Schema::create(TableName::APPOINTMENT, function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->default(0)->index('user_id');
            $table->integer('service_id')->default(0)->index('service_id');
            $table->dateTime('datetime')->default(Carbon::now());
            $table->string('note')->default('');
            $table->string('phone_number')->default('');
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
        Schema::dropIfExists(TableName::APPOINTMENT);
    }
};
