<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create cess Table
        Schema::create('cess', function(Blueprint $table)
        {
            $table->integer('id')->primary();
            $table->decimal('rate', 10);
            $table->string('description', 50);
        });

        //Insert Default Values in cess Table
        DB::table('cess')->insert(
            array(
                array(
                    'id' => '0',
                    'rate' => '0',
                    'Description' => 'Unknown',
                ),
                array(
                    'id' => '1',
                    'rate' => '0',
                    'description' => 'Cess Free',
                )
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
        //Drop Cess table
        Schema::drop('cess');
    }
}
