<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_additionals', function (Blueprint $table) {
            $table->id();
            $table->string('szMLS_no')->index();
            $table->string('fTotalUnits')->nullable();
            $table->string('szMLSArea')->nullable();
            $table->string('sHeating')->nullable();
            $table->string('szHeatingTypes')->nullable();
            $table->string('sPropertyAttached')->nullable();
            $table->string('szCommonWalls')->nullable();
            $table->string('szLaundyFeatures')->nullable();
            $table->string('sPrivatePool')->nullable();
            $table->string('szPoolFeatures')->nullable();
            $table->string('szFlooringType')->nullable();
            $table->string('szInteriorFeatures')->nullable();
            $table->string('szLotFeatures')->nullable();
            $table->string('szLotSizeAcres')->nullable();
            $table->string('fLotSizeAcres')->nullable();
            $table->string('szLotSizeSource')->nullable();
            $table->string('sLotSizeUnits')->nullable();
            $table->string('fLotSizeSQFT')->nullable();
            $table->string('szParkingFeatures')->nullable();
            $table->string('iTotalParking')->nullable();
            $table->string('szWaterSource')->nullable();
            $table->string('szSewer')->nullable();
            $table->string('szCoolingType')->nullable();
            $table->string('sCooling')->nullable();
            $table->string('szFinance')->nullable();
            $table->string('szAppliances')->nullable();
            $table->string('sHOA')->nullable();
            $table->string('dHOAFee')->nullable();
            $table->string('szCommunityFeatures')->nullable();
            $table->string('sLandLease')->nullable();
            $table->string('sLevels')->nullable();
            $table->string('szHSDistrict')->nullable();
            $table->string('szZoning')->nullable();
            $table->string('sPatio')->nullable();
            $table->string('szPatio')->nullable();
            $table->string('szSubdivisionName')->nullable();
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
        Schema::dropIfExists('property_additionals');
    }
}
