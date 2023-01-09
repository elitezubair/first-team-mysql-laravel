<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_feeds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('banner_image');
            $table->string('link');
            $table->text('description');
            $table->longText('content');
            $table->string('creator');
            $table->string('pub_ate');
            $table->string('category', 50);
            $table->string('city')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('news_feeds');
    }
}
