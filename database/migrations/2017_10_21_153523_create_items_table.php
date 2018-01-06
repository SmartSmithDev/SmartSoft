<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create items table
        Schema::create('items', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->string('sku', 30)->unique();
            $table->string('name', 100);
            $table->enum('type', array('Goods','Services'));
            $table->string('hsn', 10)->default('00000000');
            $table->integer('unit_id')->default(0);
            $table->string('details', 100);
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
        //drop items table
        Schema::drop('items');
    }
}
