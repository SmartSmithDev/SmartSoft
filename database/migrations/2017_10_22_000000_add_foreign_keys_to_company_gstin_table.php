<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToCompanyGstinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('company_gstin', function(Blueprint $table)
        {
            $table->foreign('company_id', 'fk_gstin_company_id')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('state_id', 'fk_gstin_state_id')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('company_gstin', function(Blueprint $table)
        {
            $table->dropForeign('fk_gstin_company_id');
            $table->dropForeign('fk_gstin_state_id');
        });
    }
}
