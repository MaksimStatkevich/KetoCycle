<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_inform', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('age')->nullable()->comment('years')->default('0');
            $table->double('height')->nullable()->default('0')->comment('cm');
            $table->double('weight')->nullable()->default('0')->comment('kg');
            $table->tinyInteger('sex')->nullable()->default('0')->comment('0 - men 1 - women');
            $table->tinyInteger('system_of_units')->nullable()->default('0')->comment('0 - imperial 1 - metric');
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
        Schema::dropIfExists('user_inform');
    }
}
