<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * Generated by Database Modeler Lite
 * https://play.google.com/store/apps/details?id=adrian.adbm
 * 
 * Created: Jul 24, 2021
*/

class CreateContextEntriesTable extends Migration {

    public function up() {
        Schema::create('context_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->nullable()->unsigned();
            $table->integer('context_id')->nullable()->unsigned();
            $table->string('year', 100)->nullable();
            $table->string('content', 100)->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('context_id')->references('id')->on('contexts');
			$table->timestamps();
			$table->softDeletes();
        });
    }

    public function down() {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
        });
        Schema::table('contexts', function (Blueprint $table) {
            $table->dropForeign(['context_id']);
        });
        Schema::dropIfExists('context_entries');
    }
}
