<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create hsn Table
        Schema::create('hsn', function(Blueprint $table)
        {
            $table->string('hsn', 10)->primary();
            $table->integer('gst_id')->default(0);
            $table->integer('cess_id')->default(1);
            $table->enum('item_type', array('Unknown','Goods','Services'))->default('Unknown');
            $table->string('description', 500);
            $table->timestamps();
            $table->softDeletes();
        });


        DB::table('hsn')->insert(
            array(
                'hsn' => '00000000',
                'gst_id' => '0',
                'cess_id' => '0',
                'item_type' => 'Unknown',
                'description' => 'UNKNOWN',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop hsn table
        Schema::drop('hsn');
    }
}
