<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToSalesFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        //
        Schema::table('sales_files', function(Blueprint $table)
        {
           $table->foreign('user_id','fk_sales_files_user_id')->references('id')->on('users');
            $table->foreign('sales_id','fk_sales_files_sales_id')->references('id')->on('sales');
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
        Schema::table('sales_files', function(Blueprint $table)
        {
            $table->dropForeign('fk_sales_files_user_id');
            $table->dropForeign('fk_sales_files_sales_id');

        });
    }
}
