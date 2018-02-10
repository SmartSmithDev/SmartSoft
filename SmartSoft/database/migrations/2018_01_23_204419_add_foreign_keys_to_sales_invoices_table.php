<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToSalesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sales_invoices', function(Blueprint $table)
        {
           $table->foreign('user_id','fk_user_id_invoices')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('sales_id','fk_sales_id_invoices')->references('id')->on('sales')->onDelete('CASCADE');
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
        Schema::table('sales_invoices', function(Blueprint $table)
        {
            $table->dropForeign('fk_user_id_invoices');
            $table->dropForeign('fk_sales_id_invoices');

        });
    }
}
