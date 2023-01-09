<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePropertyAdditionalsViewsTable extends Migration
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
        Schema::dropIfExists('property_additionals_views');
    }
    private  function sql_view(): string
    {
        return <<<SQL
                CREATE OR REPLACE VIEW property_additionals_views AS 
                SELECT id,if(pa.iTotalParking=1,1,NULL) as carspace1,if(pa.iTotalParking=2,1,NULL) as carspace2,if(pa.iTotalParking=3,1,NULL) as carspace3,if(pa.iTotalParking=4,1,NULL) as carspace4,if(pa.iTotalParking>=5,1,NULL) as carspace5plus 
                FROM property_additionals as pa

        SQL;
    }
}
