<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSocialInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_social_information')){
            Schema::create('user_social_information', function (Blueprint $table) {
                $table->unsignedBigInteger('id')->primary();
                $table->timestamps();
            });
        }
        Schema::table('user_social_information', function (Blueprint $table) {
            if (!Schema::hasColumn('user_social_information', 'health_status')) {
                $table->unsignedTinyInteger('health_status');
            }else{
                $table->unsignedTinyInteger('health_status')->change();
            }
            if (!Schema::hasColumn('user_social_information', 'diseases')) {
                $table->string('diseases')->nullable();
            }else{
                $table->string('diseases')->nullable()->change();
            }
            if (!Schema::hasColumn('user_social_information', 'left_handed')) {
                $table->boolean('left_handed')->default(false);
            }else{
                $table->boolean('left_handed')->default(false)->change();
            }
            if (!Schema::hasColumn('user_social_information', 'devotion_status')) {
                $table->unsignedTinyInteger('devotion_status')->nullable();
            }else{
                $table->unsignedTinyInteger('devotion_status')->nullable()->change();
            }
            if (!Schema::hasColumn('user_social_information', 'devotion')) {
                $table->string('devotion')->nullable();
            }else{
                $table->string('devotion')->nullable()->change();
            }
            if (!Schema::hasColumn('user_social_information', 'charity_status')) {
                $table->boolean('charity_status')->default(false);
            }else{
                $table->boolean('charity_status')->default(false)->change();
            }
            if (!Schema::hasColumn('user_social_information', 'charity')) {
                $table->string('charity')->nullable();
            }else{
                $table->string('charity')->nullable()->change();
            }
            if (!Schema::hasColumn('user_social_information', 'meta')) {
                $table->text('meta')->nullable();
            }else{
                $table->text('meta')->nullable()->change();
            }

            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexesFound = $sm->listTableIndexes('user_social_information');
            if(!array_key_exists("user_social_information_id_foreign", $indexesFound)) {
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
        Schema::dropIfExists('user_social_information');
    }
}
