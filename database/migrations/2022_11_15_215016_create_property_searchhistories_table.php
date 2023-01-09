<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertySearchhistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_searchhistories', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->index();  
            $table->string('search_string');  
            $table->string('search_json_data')->nullable();  
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
        Schema::dropIfExists('property_searchhistories');
    }
}
