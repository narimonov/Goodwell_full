<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('familiya')->nullable();

            $table->string('otchestvo')->nullable();

            $table->string('email');

            $table->string('desc')->nullable();

            $table->datetime('email_verified_at')->nullable();

            $table->string('password');

            $table->integer('created_by')->nullable();

            $table->string('inn')->nullable();

            $table->string('num_licensy')->nullable();

            $table->string('mfo')->nullable();

            $table->string('number')->nullable();

            $table->integer('role_id')->nullable();

            $table->integer('transaction_type_id')->nullable();

            $table->integer('type')->nullable();

            $table->string('remember_token')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
