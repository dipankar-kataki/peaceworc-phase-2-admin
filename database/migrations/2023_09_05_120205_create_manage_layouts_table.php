<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_layouts', function (Blueprint $table) {
            $table->id();
            $table->boolean('banner')->default(1);
            $table->boolean('about')->default(1);
            $table->boolean('service')->default(1);
            $table->boolean('become_caregiver')->default(1);
            $table->boolean('become_agency')->default(1);
            $table->boolean('testimonial')->default(1);
            $table->boolean('contact_us')->default(1);
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
        Schema::dropIfExists('manage_layouts');
    }
}
