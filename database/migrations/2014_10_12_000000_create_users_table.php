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
        Schema::create(TableName::USER, function (Blueprint $table) {
            $table->id();

            $table->string('email')->unique();
            $table->string('password');
            $table->string('full_name');
            $table->dateTime('birthday')->nullable();
            $table->string('gender')->default('Nữ');
            $table->string('phone_number')->default('');
            $table->string('address')->default('TP Hồ Chí Minh');

            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists(TableName::USER);
    }
};
