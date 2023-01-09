<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->string('szMLS_no')->index()->uniqid();
            $table->string('sJustListed');
            $table->string('sPriceReduced');
            $table->string('sViews');
            $table->string('sSpa');
            $table->string('sPool');
            $table->string('sGolfCourse');
            $table->string('sFireplace');
            $table->string('sAirconditioning');
            $table->string('sAdult55Plus');
            $table->string('sOpenHouse');
            $table->string('sDeck');
            $table->string('sWaterFront');
            $table->string('sBasement');
            $table->string('sMasterOnMain');
            $table->string('sHorseProperty');
            $table->string('sFixerUpper');
            $table->string('sNewlyBuilt');
            $table->string('sForeclosures');
            $table->string('sShortSales');
            $table->string('sNoHOAFees');
            $table->string('sSellerFinancing');
            $table->string('sFurnished');
            $table->string('sAllowsPets');
            $table->string('s1CarGarage');
            $table->string('s2CarGarage');
            $table->string('s3CarGarage');
            $table->string('s1Storey');
            $table->string('s2Stories');
            $table->string('s3Stories');
            $table->enum('status',['new','active', 'deactivated', 'suspended','pending','completed'])->default('active');
            $table->string('remarks')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('amenities');
    }
}
