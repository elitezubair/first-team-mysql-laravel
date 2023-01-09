<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAminitiesViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->sql_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aminities_views');
    }
    private  function sql_view(): string
    {
        return <<<SQL
                CREATE OR REPLACE VIEW aminities_views AS
                SELECT am.id,if(am.sJustListed='Y',1,NULL) as just_listed,if(am.sViews='Y',1,NULL) as views,if(am.sPool='Y',1,NULL) as pool,if(am.sAdult55Plus='Y',1,NULL) as adult55,if(am.sWaterFront='Y',1,NULL) as waterfront,if(am.sFixerUpper='Y',1,NULL) as fixerupper,if(am.sHorseProperty='Y',1,NULL) as horse_property,if(am.sNewlyBuilt='Y',1,NULL) as newly_built,if(am.sSellerFinancing='Y',1,NULL) as seller_finiancing,if(am.sForeclosures='Y',1,NULL) as fore_closure,if(am.sNoHOAFees='Y',1,NULL) as nohoefee,if(am.s1Storey='Y',1,NULL) as s1story,if(am.s2Stories='Y',1,NULL) as s2stories,if(am.s3Stories='Y',1,NULL) as s3stories,if(am.sFireplace='Y',1,NULL) as sFireplace,if(am.sBasement='Y',1,NULL) as sBasement,if(am.sMasterOnMain='Y',1,NULL) as master_onMain,if(am.sAirconditioning='Y',1,NULL) as sAirconditioning,if(am.sDeck='Y',1,NULL) as sDeck,if(am.sFurnished='Y',1,NULL) as sFurnished,if(am.sAllowsPets='Y',1,NULL) as sAllowsPets,if(am.sGolfCourse='Y',1,NULL) as sGolfCourse
                FROM amenities as am
                RIGHT JOIN property_listings AS plisting
                ON plisting.szMLS_no= am.szMLS_no;

        SQL;
    }
}


// CREATE OR REPLACE VIEW aminities_views AS
//                 SELECT id,
//                 sum(IF(sJustListed='Y', 1, 0)) as just_listed,
//                 sum(IF(sViews='Y', 1, 0)) as views,
//                 sum(IF(sPool='Y', 1, 0)) as pool,
//                 sum(IF(sAdult55Plus='Y', 1, 0)) as adult55,
//                 sum(IF(sWaterFront='Y', 1, 0)) as waterfront,
//                 sum(IF(sFixerUpper='Y', 1, 0)) as fixerupper,
//                 sum(IF(sHorseProperty='Y', 1, 0)) as horse_property,
//                 sum(IF(sNewlyBuilt='Y', 1, 0)) as newly_built,
//                 sum(IF(sSellerFinancing='Y', 1, 0)) as seller_finiancing,
//                 sum(IF(sForeclosures='Y', 1, 0)) as fore_closure,
//                 sum(IF(sNoHOAFees='Y', 1, 0)) as nohoefee,
//                 sum(IF(s1Storey='Y', 1, 0)) as s1story,
//                 sum(IF(s2Stories='Y', 1, 0)) as s2stories,
//                 sum(IF(s3Stories='Y', 1, 0)) as s3stories,
//                 sum(IF(sFireplace='Y', 1, 0)) as sFireplace,
//                 sum(IF(sBasement='Y', 1, 0)) as sBasement,
//                 sum(IF(sMasterOnMain='Y', 1, 0)) as master_onMain,
//                 sum(IF(sAirconditioning='Y', 1, 0)) as sAirconditioning,
//                 sum(IF(sDeck='Y', 1, 0)) as sDeck,
//                 sum(IF(sFurnished='Y', 1, 0)) as sFurnished,
//                 sum(IF(sAllowsPets='Y', 1, 0)) as sAllowsPets,
//                 sum(IF(sGolfCourse='Y', 1, 0)) as sGolfCourse
//             FROM amenities


