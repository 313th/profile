<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'username')) {
                $table->string('username')->unique()->change();
            }else{
                $table->string('username')->unique();
            }
            if (Schema::hasColumn('users', 'password')) {
                $table->string('password')->change();
            }else{
                $table->string('password');
            }
            if (!Schema::hasColumn('users', 'display_name')) {
                $table->string('display_name');
            }
            if (!Schema::hasColumn('users', 'remember_token')) {
                $table->rememberToken();
            }
            if (Schema::hasColumn('users', 'email')) {
                $table->string('email')->nullable()->change();
                $sm = Schema::getConnection()->getDoctrineSchemaManager();
                $indexesFound = $sm->listTableIndexes('users');

                if(array_key_exists("users_email_unique", $indexesFound)) {
                    $table->dropUnique('users_email_unique');
                }
            }else{
                $table->string('email')->nullable();
            }
            if (Schema::hasColumn('users', 'email_verified_at')) {
                $table->string('email_verified_at')->nullable()->change();
            }else{
                $table->string('email_verified_at')->nullable();
            }
            if (Schema::hasColumn('users', 'mobile')) {
                $table->string('mobile')->nullable()->change();
            }else{
                $table->string('mobile')->nullable();
            }
            if (Schema::hasColumn('users', 'mobile_verified_at')) {
                $table->string('mobile_verified_at')->nullable()->change();
            }else{
                $table->string('mobile_verified_at')->nullable();
            }
            if (Schema::hasColumn('users', 'status')) {
                $table->unsignedTinyInteger('last_login')->default(0)->change();
            }else{
                $table->unsignedTinyInteger('last_login')->default(0)->nullable();
            }
            if (Schema::hasColumn('users', 'last_login')) {
                $table->timestamp('last_login')->nullable()->change();
            }else{
                $table->timestamp('last_login')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
