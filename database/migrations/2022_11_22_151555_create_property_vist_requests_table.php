<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyVistRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_vist_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id')->index();
            $table->string('szMLS_no')->index();
            $table->string('szAddress_nm');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->index();
            $table->string('phone');
            $table->string('tour_type');
            $table->string('description');
            $table->date('scheduled_date');
            $table->time('scheduled_time');
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
        Schema::dropIfExists('property_vist_requests');
    }
}
