<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageAppLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_app_links', function (Blueprint $table) {
            $table->id();
            $table->string('caregiver_android_link')->nullable();
            $table->string('caregiver_ios_link')->nullable();
            $table->string('agency_android_link')->nullable();
            $table->string('agency_ios_link')->nullable();
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
        Schema::dropIfExists('manage_app_links');
    }
}
