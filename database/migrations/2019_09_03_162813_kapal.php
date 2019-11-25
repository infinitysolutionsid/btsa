<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kapal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalkapal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kotaasal');
            $table->string('kotatujuan');
            $table->string('vessel');
            $table->string('voy');
            $table->string('closingdate');
            $table->string('etd');
            $table->string('eta');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::drop('jadwalkapal');
    }
}
