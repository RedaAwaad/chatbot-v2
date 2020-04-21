<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSerringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('big_circle')->default('#f1f7ff');
            $table->string('small_circle')->default('#f9f0fe');
            $table->string('start_chat')->default('#29abe2');
            $table->unsignedBigInteger('user_id');
            $table->string('text2')->nullable();
            $table->string('text3')->nullable();
            $table->string('icon')->nullable();
            $table->string('tw')->nullable();
            $table->string('ln')->nullable();
            $table->string('fb')->nullable();
            $table->string('phone')->nullable();
            $table->string('picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
