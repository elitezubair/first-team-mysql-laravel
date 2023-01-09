<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLbsOtpValidatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lbs_otp_validators', function (Blueprint $table) {
            $table->id();
            $table->string('target');
            $table->enum('driver',['email','phone','authenticator'])->default('email');
            $table->string('otp');
            $table->timestamp('expiry');
            $table->boolean('verified')->nullable();
            $table->string('verified_at')->nullable();
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
        Schema::dropIfExists('lbs_otp_validators');
    }
}
