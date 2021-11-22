<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');

            $table->longText('fio')->nullable();

            $table->string('doljnost')->nullable();

            $table->string('created_by')->nullable();

            $table->longText('note_text')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
