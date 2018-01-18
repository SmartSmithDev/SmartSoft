<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create companies Table
        Schema::create('companies', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->string('name', 50);
            $table->string('pan', 11);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Cess table
        Schema::drop('companies');
    }
}
