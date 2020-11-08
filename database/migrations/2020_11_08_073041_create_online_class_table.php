<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_class', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title');
            $table->string('summary');
            $table->longText('detail');
            $table->string('level');
            $table->integer('price');
            $table->integer('promo_price');
            $table->string('tag');
            $table->integer('lesson');
            $table->string('trailer');
            $table->string('video');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('online_class');
    }
}
