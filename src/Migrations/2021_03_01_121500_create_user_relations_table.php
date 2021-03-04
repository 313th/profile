<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_relations')){
            Schema::create('user_relations', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }
        Schema::table('user_relations', function (Blueprint $table) {
            if (!Schema::hasColumn('user_relations', 'from_user_id')) {
                $table->unsignedBigInteger('from_user_id');
            }else{
                $table->unsignedBigInteger('from_user_id')->change();
            }
            if (!Schema::hasColumn('user_relations', 'to_user_id')) {
                $table->unsignedBigInteger('to_user_id');
            }else{
                $table->unsignedBigInteger('to_user_id')->change();
            }
            if (!Schema::hasColumn('user_relations', 'relation')) {
                $table->unsignedInteger('relation');
            }else{
                $table->unsignedInteger('relation')->change();
            }
            if (!Schema::hasColumn('user_relations', 'status')) {
                $table->unsignedInteger('status');
            }else{
                $table->unsignedInteger('status')->change();
            }
            if (!Schema::hasColumn('user_relations', 'meta')) {
                $table->string('meta')->nullable();
            }else{
                $table->string('meta')->nullable()->change();
            }

            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexesFound = $sm->listTableIndexes('user_relations');
            if(!array_key_exists("user_relations_from_user_id_foreign", $indexesFound)) {
                $table->foreign('from_user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            }
            if(!array_key_exists("user_relations_to_user_id_foreign", $indexesFound)) {
                $table->foreign('to_user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            }
            if(!array_key_exists("user_relations_from_user_id_to_user_id_unique", $indexesFound)) {
                $table->unique(['from_user_id','to_user_id']);
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
        Schema::dropIfExists('user_relations');
    }
}
