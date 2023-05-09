<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('postType_id');
            $table->string('title',200);
            $table->string('slug',200);
            $table->string('times',100);
            $table->dateTime('schedule');
            $table->dateTime('time_down');
            $table->float('price', 8, 2);
            $table->float('discount', 8, 2);
            $table->string('place',5);
            $table->longText('short_description');
            $table->longText('description');
            $table->boolean('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
