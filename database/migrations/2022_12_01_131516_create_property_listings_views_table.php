<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePropertyListingsViewsTable extends Migration
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
        Schema::dropIfExists('property_listings_views');
    }
    private  function sql_view(): string
    {
        return <<<SQL
                CREATE OR REPLACE VIEW property_listings_views AS
                SELECT id,if(pl.dBath_no=1,1,NULL) as bathroom1,if(pl.dBath_no=2,1,NULL) as bathroom2,if(pl.dBath_no=3,1,NULL) as bathroom3,if(pl.dBath_no=4,1,NULL) as bathroom4,if(pl.dBath_no>=5,1,NULL) as bathroom5plus,if(pl.iBR_no=1,1,NULL) as bedroom1,if(pl.iBR_no=2,1,NULL) as bedroom2,if(pl.iBR_no=3,1,NULL) as bedroom3,if(pl.iBR_no=4,1,NULL) as bedroom4,if(pl.iBR_no >=5,1,NULL) as bedroom5plus,pl.szPropType_cd as property_type,pl.szCounty_nm as county , pl.sZip_cd as zipcode, pl.szCity_nm as city
                FROM property_listings as pl;

        SQL;
    }
}
