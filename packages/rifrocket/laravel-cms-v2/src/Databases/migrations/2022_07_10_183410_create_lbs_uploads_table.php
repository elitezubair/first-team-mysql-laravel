<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLbsUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lbs_uploads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('provider');
            $table->string('original_name')->index();
            $table->string('alternate_name')->nullable();
            $table->string('description')->nullable();
            $table->string('file_path');
            $table->string('file_size');
            $table->string('file_type');
            $table->string('file_extension');
            $table->integer('file_id')->nullable();
            $table->string('file_hight')->nullable();
            $table->string('file_width')->nullable();
            $table->boolean('is_private')->default(0);
            $table->string('external_link')->nullable();
            $table->string('user_set')->nullable();
            $table->enum('directory',['public','storage'])->default('storage');
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
        Schema::dropIfExists('lbs_uploads');
    }
}
