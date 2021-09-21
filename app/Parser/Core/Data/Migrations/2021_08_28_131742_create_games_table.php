<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('store_id'); // Id of MS Xbox Game
            $table->boolean('is_new')->default(false);
            $table->boolean('is_exist')->default(false);
            $table->string('category');
            $table->string('slug');
            $table->string('publisher')->nullable();
            $table->string('img_prewie')->nullable();
            $table->string('img_art')->nullable();
            $table->string('img_with_title')->nullable();
            $table->text('description');
            $table->dateTime('release_date');
            $table->integer('min_user_age');
            $table->boolean('x360_support')->default(false);
            $table->boolean('xseries_support')->default(false);
            $table->text('game_capabilities')->nullable();
            $table->boolean('ru_local')->default(false);
            $table->text('all_local')->nullable();
            $table->float('rating')->nullable();
            $table->boolean('is_gold')->default(false);
            $table->boolean('is_gold_free')->default(false);
            $table->boolean('is_game_pass')->default(false);
            $table->boolean('is_ea')->default(false);
            $table->boolean('is_free')->default(false);
            $table->boolean('discount')->default(false);
            $table->float('selling_price')->nullable();
            $table->float('old_price')->nullable();
            $table->float('difference')->nullable();
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
//        Schema::dropIfExists('games');
    }
}
