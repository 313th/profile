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
        if(!Schema::hasTable('user_profiles')){
            Schema::create('users', function (Blueprint $table) {
                $table->unsignedBigInteger('id')->unique();
                $table->timestamps();
            });
        }
        Schema::table('user_profiles', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name');
            }else{
                $table->string('name');
            }
            if (!Schema::hasColumn('users', 'family')) {
                $table->string('family');
            }else{
                $table->string('family');
            }
            if (!Schema::hasColumn('users', 'nation_code')) {
                $table->string('nation_code')->nullable();
            }else{
                $table->string('nation_code')->nullable();
            }
            if (!Schema::hasColumn('users', 'birth_date')) {
                $table->timestamp('birth_date')->nullable();
            }else{
                $table->timestamp('birth_date')->nullable();
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable();
            }else{
                $table->text('address')->nullable();
            }
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('postal_code')->nullable();
            }else{
                $table->string('postal_code')->nullable();
            }
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('tel')->nullable();
            }else{
                $table->string('tel')->nullable();
            }
            if (!Schema::hasColumn('users', 'image')) {
                $table->string('image')->nullable();
            }else{
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('users', 'meta')) {
                $table->text('meta')->nullable();
            }else{
                $table->text('meta')->nullable();
            }
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexesFound = $sm->listTableIndexes('user_profiles');

            if(!array_key_exists("users_email_unique", $indexesFound)) {
                $table->foreign('id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('user_profiles');
    }
}
