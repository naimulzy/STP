<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('name');
            $table->integer('price')->unsigned();
            $table->string('negotiation');
            $table->string('category')->nullable();
            $table->string('condition');
            $table->integer('used_time')->unsigned()->nullable()->default(0);
            $table->longText('description');
            $table->longText('specification');
            $table->integer('available')->unsigned()->default(1);
            $table->string('image')->nullable();
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
        Schema::dropIfExists('ads');
    }
}
