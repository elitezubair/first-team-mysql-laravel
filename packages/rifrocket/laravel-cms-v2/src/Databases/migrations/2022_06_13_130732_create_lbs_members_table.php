<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLbsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lbs_members', function (Blueprint $table) {
            $table->id();
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('country',50)->nullable();
            $table->string('country_code',10)->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('phone_code',10)->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('role')->nullable();
            $table->string('category')->nullable();
            $table->integer('avatar')->nullable();
            $table->string('profile_url')->nullable();
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
        Schema::dropIfExists('lbs_members');
    }
}
