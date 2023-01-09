<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_enquiries', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id')->index();
            $table->string('szMLS_no')->index();
            $table->string('szAddress_nm');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('type');
            $table->string('description');
            $table->string('tnc')->nullable();
            $table->string('eq_status')->default('open');
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
        Schema::dropIfExists('property_enquiries');
    }
}
