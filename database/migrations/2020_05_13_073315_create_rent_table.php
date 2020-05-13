<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('cd_id');
            $table->date('start_rent')->nullable();
            $table->date('end_rent')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
            $table->index('user_id');
            $table->index('cd_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent');
    }
}
