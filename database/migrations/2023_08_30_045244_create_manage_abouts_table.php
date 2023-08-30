<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_abouts', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('main_text')->nullable();
            $table->text('sub_text_1')->nullable();
            $table->text('sub_text_2')->nullable();
            $table->text('sub_text_3')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('manage_abouts');
    }
}
