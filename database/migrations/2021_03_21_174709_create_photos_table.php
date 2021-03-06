<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('photos')) {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('event');
            $table->text('photo');
            $table->string('title')->nullable();
            $table->string('author');
            // $table->string('author_name');
            $table->text('notes');
            $table->double('note')->nullable();
            $table->text('nominations');
            $table->text('comments');
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
