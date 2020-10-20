<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('track_id');
            $table->string('order_id');
            $table->string('current_location');
            $table->string('last_location');
            $table->string('status');
            $table->string('container_type_system');
            $table->string('estimated_arrival_date');
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
        Schema::dropIfExists('track_reports');
    }
}
