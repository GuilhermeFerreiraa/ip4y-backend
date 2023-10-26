<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUuidToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('id')->change();
            $table->primary('id');
            $table->string('document')->unique();
            $table->string('name');
            $table->string('lastName');
            $table->date('birthdate');
            $table->string('email')->unique();
            $table->string('gender', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropPrimary('users_id_primary');
            $table->uuid('id')->change();
            $table->string('document')->unique();
            $table->string('name');
            $table->string('lastName');
            $table->date('birthdate');
            $table->string('email')->unique();
            $table->string('gender', 255);
            $table->timestamps();
        });
    }
}
