<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentrostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentrosters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('license')->index()->unique();
            $table->integer('OfficeID')->index();
            $table->bigInteger('agentID')->index();
            $table->string('OfficeName');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('ImagePath')->nullable();
            $table->string('MobileNo');
            $table->string('MobileNo_code')->nullable();
            $table->string('OfficePhone')->nullable();
            $table->string('WebSite')->nullable();
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
        Schema::dropIfExists('agentrosters');
    }
}
