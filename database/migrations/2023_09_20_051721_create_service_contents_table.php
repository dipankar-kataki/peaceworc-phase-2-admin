<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->longText('content');
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('list_of_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_contents');
    }
}
