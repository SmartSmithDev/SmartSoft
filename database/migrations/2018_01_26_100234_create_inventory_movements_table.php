<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_movements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku',30)->unique('unique_sku');
            $table->string('ref');
            $table->integer('company_id');
            $table->integer('from_company_branch_id');
            $table->integer('to_company_branch_id');
            $table->string('state_before');
            $table->string('state_after');
            $table->integer('quantity_before');
            $table->integer('quantity_after');
            $table->decimal('cost', 15 , 2);
            $table->string('reason');
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
        Schema::dropIfExists('inventory_movements');
    }
}
