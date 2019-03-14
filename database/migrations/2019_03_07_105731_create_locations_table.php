<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manufacturer');
            $table->string('model');
            $table->string('version_release');
            $table->string('version_name');

            $table->string('provider');
            $table->string('accuracy');
            $table->string('latitude');
            $table->string('longitude');

            $table->string('cdmaDbm');
            $table->string('cdmaEcio');
            $table->string('evdoDbm');
            $table->string('evdoEcio');
            $table->string('evdoSnr');
            $table->string('gsmBitErrorRate');
            $table->string('mLteRsrp');
            $table->string('mLteRsrq');
            $table->string('mLteRssnr');
            $table->string('mLteCqi');

            $table->string('signal');
            $table->string('level');
            $table->string('networkType');
            $table->string('gpsEnabled');
            $table->string('isgsm');
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
        Schema::dropIfExists('locations');
    }
}
