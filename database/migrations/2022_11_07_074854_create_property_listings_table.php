<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_listings', function (Blueprint $table) {
            $table->id();
            $table->string('iCounter_no')->index();
            $table->string('szMLS_no')->index();
            $table->string('sStatus_cd');
            $table->string('sSingleStatus_cd');
            $table->string('iPropType_id');
            $table->string('szPropType_cd');
            $table->string('szAddress_nm');
            $table->string('szUnit_no');
            $table->string('iArea_cd');
            $table->string('szSubArea_nm');
            $table->string('szCity_nm');
            $table->string('sZip_cd');
            $table->string('iBR_no');
            $table->string('dBath_no');
            $table->string('iSqFt_no');
            $table->string('iYearBuilt_no');
            $table->string('mListPrice_amt');
            $table->string('mPrice_amt');
            $table->string('iLease_fl');
            $table->string('iInternetAd_fl');
            $table->string('dtList_dt');
            $table->string('dtPending_dt');
            $table->string('dtSold_dt');
            $table->string('szListingAgent_id');
            $table->string('szListingAgent_nm');
            $table->string('szListingAgent_DRE');
            $table->string('sListingAgentPager_no');
            $table->string('sListingAgentHomePhone_no');
            $table->string('sListingAgentCellPhone_no');
            $table->string('szListingAgentEMail_nm');
            $table->string('szListingOffice_id');
            $table->string('szListingOffice_nm');
            $table->string('lListingOffice_sk');
            $table->string('szSellingAgent_id');
            $table->string('szSellingAgent_nm');
            $table->string('szSellingAgent_DRE');
            $table->string('szSellingOffice_id');
            $table->string('szSellingOffice_nm');
            $table->string('lSellingOffice_sk');
            $table->string('szCoListingAgent_id');
            $table->string('szCoListingAgent_nm');
            $table->string('szCoListingAgent_DRE');
            $table->string('szCoListingOffice_id');
            $table->string('szCoListingOffice_nm');
            $table->string('szCoSellingAgent_id');
            $table->string('szCoSellingAgent_nm');
            $table->string('szCoSellingAgent_DRE');
            $table->string('szCoSellingOffice_id');
            $table->string('szCoSellingOffice_nm');
            $table->string('dtOffMarket_dt');
            $table->string('iDaysOnMarket_no');
            $table->string('dtWithdrawn_dt');
            $table->string('dtExpired_dt');
            $table->string('dtTransaction_dt');
            $table->string('szBoard_nm');
            $table->string('szLastUpdate_id');
            $table->string('dtLastUpdate_dt');
            $table->string('szCounty_nm');
            $table->string('sState_cd');
            $table->string('longtitude');
            $table->string('latitude');
            $table->string('sHotBuys_fl');
            $table->text('VirtualTourURL');
            $table->text('szPropertyDescription_nm');
            $table->string('search_county')->index();
            $table->string('search_city')->index();
            $table->string('search_address')->index();
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
        Schema::dropIfExists('property_listings');
    }
}
