<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cityid')->nullable();
            $table->foreign('cityid')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->string('AreaName', 250)->collation('utf8mb4_unicode_ci')->nullable();
            $table->double('latitude',8,2);
            $table->double('longitude',8,2);
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
        Schema::dropIfExists('areas');
    }
}
