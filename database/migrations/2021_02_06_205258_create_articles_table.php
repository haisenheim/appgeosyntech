<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->string('name')->nullable();
	        $table->text('description')->nullable();
	        $table->integer('tarticle_id')->default(0);
	        $table->integer('familiy_id')->default(0);
	        $table->integer('fournisseur_id')->default(0);
	        $table->boolean('re')->default(false);
	        $table->boolean('se')->default(false);
	        $table->boolean('fi')->default(false);
	        $table->boolean('et')->default(false);
	        $table->boolean('dr')->default(false);
	        $table->boolean('pr')->default(false);
	        $table->boolean('en')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
