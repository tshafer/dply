<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('url_id');
            $table->string('iso_code')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('state_name')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('timezone')->nullable();
            $table->string('continent')->nullable();
            $table->string('currency')->nullable();
            $table->string('browser_name')->nullable();
            $table->string('browser_family')->nullable();
            $table->string('browser_version')->nullable();
            $table->string('browser_version_major')->nullable();
            $table->string('browser_version_minor')->nullable();
            $table->string('browser_version_patch')->nullable();
            $table->string('browser_engine')->nullable();
            $table->string('platform_name')->nullable();
            $table->string('platform_family')->nullable();
            $table->string('platform_version')->nullable();
            $table->string('platform_version_major')->nullable();
            $table->string('platform_version_minor')->nullable();
            $table->string('platform_version_patch')->nullable();
            $table->string('device_family')->nullable();
            $table->string('device_model')->nullable();
            $table->string('mobile_grade')->nullable();
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
        Schema::dropIfExists('stats');
    }
}
