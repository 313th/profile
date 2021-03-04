<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEmploymentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_employment_information')){
            Schema::create('user_employment_information', function (Blueprint $table) {
                $table->unsignedBigInteger('id')->primary();
                $table->timestamps();
            });
        }
        Schema::table('user_employment_information', function (Blueprint $table) {
            if (!Schema::hasColumn('user_employment_information', 'job')) {
                $table->string('job');
            }else{
                $table->string('job')->change();
            }
            if (!Schema::hasColumn('user_employment_information', 'education')) {
                $table->unsignedInteger('education');
            }else{
                $table->unsignedInteger('education')->change();
            }
            if (!Schema::hasColumn('user_employment_information', 'field_of_study')) {
                $table->string('field_of_study');
            }else{
                $table->string('field_of_study')->change();
            }
            if (!Schema::hasColumn('user_employment_information', 'personnel_id')) {
                $table->string('personnel_id')->nullable();
            }else{
                $table->string('personnel_id')->nullable()->change();
            }
            if (!Schema::hasColumn('user_employment_information', 'meta')) {
                $table->text('meta')->nullable();
            }else{
                $table->text('meta')->nullable()->change();
            }

            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexesFound = $sm->listTableIndexes('user_employment_information');

            if(!array_key_exists("user_employment_information_id_foreign", $indexesFound)) {
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
        Schema::dropIfExists('user_employment_information');
    }
}
