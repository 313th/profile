<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLegalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_legal_information')){
            Schema::create('user_legal_information', function (Blueprint $table) {
                $table->unsignedBigInteger('id')->primary();
                $table->timestamps();
            });
        }
        Schema::table('user_legal_information', function (Blueprint $table) {
            if (!Schema::hasColumn('user_legal_information', 'certificate_number')) {
                $table->string('certificate_number');
            }else{
                $table->string('certificate_number')->change();
            }
            if (!Schema::hasColumn('user_legal_information', 'place_of_birth')) {
                $table->string('place_of_birth');
            }else{
                $table->string('place_of_birth')->change();
            }
            if (!Schema::hasColumn('user_legal_information', 'place_of_issuance')) {
                $table->string('place_of_issuance');
            }else{
                $table->string('place_of_issuance')->change();
            }
            if (!Schema::hasColumn('user_legal_information', 'birth_certificate_serial')) {
                $table->string('birth_certificate_serial');
            }else{
                $table->string('birth_certificate_serial')->change();
            }
            if (!Schema::hasColumn('user_legal_information', 'religion')) {
                $table->string('religion');
            }else{
                $table->string('religion')->change();
            }
            if (!Schema::hasColumn('user_legal_information', 'religion_branch')) {
                $table->string('religion_branch');
            }else{
                $table->string('religion_branch')->change();
            }
            if (!Schema::hasColumn('user_legal_information', 'nationality')) {
                $table->string('nationality');
            }else{
                $table->string('nationality')->change();
            }
            if (!Schema::hasColumn('user_legal_information', 'meta')) {
                $table->text('meta')->nullable();
            }else{
                $table->text('meta')->nullable()->change();
            }
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexesFound = $sm->listTableIndexes('user_legal_information');

            if(!array_key_exists("user_legal_information_id_foreign", $indexesFound)) {
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
        Schema::dropIfExists('user_legal_information');
    }
}
