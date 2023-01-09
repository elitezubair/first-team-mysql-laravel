<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_urls', function (Blueprint $table) {
            $table->id();
            $table->string('sMLS_id')->index();
            $table->string('PhotoURL');
            $table->string('sPrimary_fl');
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
        Schema::dropIfExists('photo_urls');
    }
}
