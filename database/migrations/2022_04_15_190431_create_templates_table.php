<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('digital_store_id')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('file')->nullable();
            $table->string('price_type')->default(0)->comment('0 for free 1 free premium');
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->string('category_id')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->text('url')->nullable();
            $table->text('link_live_preview')->nullable();
            $table->text('link_g_drive')->nullable();
            $table->text('link_dropbox')->nullable();
            $table->text('link_git_hub')->nullable();
            $table->string('privacy')->nullable();
            $table->string('language')->nullable();
            $table->string('slug')->unique();
            $table->string('download')->default(0);
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
        Schema::dropIfExists('templates');
    }
}
