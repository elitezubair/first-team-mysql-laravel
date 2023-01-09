<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_properties', function (Blueprint $table) {
            $table->id();
            $table->string('szMLS_no')->index();
            $table->integer('member_id')->index();
            $table->string('sStatus_cd');
            $table->string('szAddress_nm');
            $table->string('szPropType_cd')->index();
            $table->string('sSingleStatus_cd')->index();
            $table->string('mPrice_amt');
            $table->string('dtList_dt');
            $table->string('dtPending_dt');
            $table->string('dtSold_dt');            
            $table->string('image');            
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
        Schema::dropIfExists('favorite_properties');
    }
}
