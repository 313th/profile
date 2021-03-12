<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_profiles')){
            Schema::create('user_profiles', function (Blueprint $table) {
                $table->unsignedBigInteger('id')->primary();
                $table->timestamps();
            });
        }
        Schema::table('user_profiles', function (Blueprint $table) {
            if (!Schema::hasColumn('user_profiles', 'name')) {
                $table->string('name');
            }else{
                $table->string('name')->change();
            }
            if (!Schema::hasColumn('user_profiles', 'family')) {
                $table->string('family');
            }else{
                $table->string('family')->change();
            }
            if (!Schema::hasColumn('user_profiles', 'nation_code')) {
                $table->string('nation_code')->nullable();
            }else{
                $table->string('nation_code')->nullable()->change();
            }
            if (!Schema::hasColumn('user_profiles', 'birth_date')) {
                $table->date('birth_date')->nullable();
            }else{
                $table->date('birth_date')->nullable()->change();
            }
            if (!Schema::hasColumn('user_profiles', 'address')) {
                $table->text('address')->nullable();
            }else{
                $table->text('address')->nullable()->change();
            }
            if (!Schema::hasColumn('user_profiles', 'postal_code')) {
                $table->string('postal_code')->nullable();
            }else{
                $table->string('postal_code')->nullable()->change();
            }
            if (!Schema::hasColumn('user_profiles', 'tel')) {
                $table->string('tel')->nullable();
            }else{
                $table->string('tel')->nullable()->change();
            }
            if (!Schema::hasColumn('user_profiles', 'image')) {
                $table->string('image')->nullable();
            }else{
                $table->string('image')->nullable()->change();
            }
            if (!Schema::hasColumn('user_profiles', 'meta')) {
                $table->text('meta')->nullable();
            }else{
                $table->text('meta')->nullable()->change();
            }
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexesFound = $sm->listTableIndexes('user_profiles');

            if(!array_key_exists("user_profiles_id_foreign", $indexesFound)) {
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
