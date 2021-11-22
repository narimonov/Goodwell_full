<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('xlsx')->nullable();
            $table->string('pdf')->nullable();
            $table->string('json')->nullable();
            $table->string('txt')->nullable();
            $table->longText('description')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
