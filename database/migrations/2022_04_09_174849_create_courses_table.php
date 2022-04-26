<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('instructor_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('file')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->string('category_id')->nullable();
            $table->text('url')->nullable();
            $table->string('link')->nullable();
            $table->string('link_g_drive')->nullable();
            $table->string('link_dropbox')->nullable();
            $table->string('link_embed')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
