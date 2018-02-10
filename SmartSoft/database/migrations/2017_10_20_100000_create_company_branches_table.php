<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create company_branches Table
        Schema::create('company_branches', function(Blueprint $table)
        {
            $table->integer('id',true);
            $table->integer('company_id');
            $table->integer('gstin_id');
            $table->string('branch_name', 50);
            $table->string('phone', 20);
            $table->string('email_id', 50);
            $table->string('address', 300);
            $table->string('city', 50);
            $table->integer('state_id');
            $table->string('country' , 50);
            $table->string('pin_code' , 10);
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
        //Drop company_branches table
        Schema::drop('company_branches');
    }
}
