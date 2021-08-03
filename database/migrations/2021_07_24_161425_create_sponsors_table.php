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

class CreateSponsorsTable extends Migration {

    public function up() {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->string('logo', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('sponsors');
    }
}