<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToHsnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add foreign Keys to hsn Table
        Schema::table('hsn', function(Blueprint $table)
        {
            $table->foreign('cess_id', 'fk_hsn_cess_id')->references('id')->on('cess')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('gst_id', 'fk_hsn_gst_id')->references('id')->on('gst')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Remove foreign Keys from hsn Table
        Schema::table('hsn', function(Blueprint $table)
        {
            $table->dropForeign('fk_hsn_cess_id');
            $table->dropForeign('fk_hsn_gst_id');
        });
    }
}
