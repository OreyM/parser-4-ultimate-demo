<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcingDurationTable extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --database=mysql
     * @return void
     */
    public function up()
    {
        Schema::create('parcing_duration', function (Blueprint $table) {
            $table->id();
            $table->integer('total')->default(0);
            $table->integer('difference')->default(0);
            $table->boolean('isBetter')->default(false);
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
        Schema::dropIfExists('parcing_duration');
    }
}
