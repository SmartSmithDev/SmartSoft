<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyGstinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create company_gstin Table
        Schema::create('company_gstin', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('gstin', 20);
            $table->integer('company_id');
            $table->integer('state_id');
            $table->unique(['gstin'], 'uk_company_gstin');
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
        Schema::drop('company_gstin');
    }
}
