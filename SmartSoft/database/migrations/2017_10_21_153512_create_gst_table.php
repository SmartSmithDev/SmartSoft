<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create gst Table
        Schema::create('gst', function(Blueprint $table)
        {
            $table->integer('id')->primary();
            $table->decimal('rate', 6, 3)->default(0.000);
            $table->decimal('cgst', 6, 3)->default(0.000);
            $table->decimal('sgst', 6, 3)->default(0.000);
            $table->decimal('ugst', 6, 3)->default(0.000);
            $table->decimal('igst', 6, 3)->default(0.000);
            $table->text('description');
        });

        DB::table('gst')->insert(
            array(
                array(
                    'id' => '0',
                    'rate' => '0.0',
                    'cgst' => '0.0',
                    'sgst' => '0.0',
                    'ugst' => '0.0',
                    'igst' => '0.0',
                    'description' => 'UNKNOWN',
                ),
                array(
                    'id' => '1',
                    'rate' => '0.0',
                    'cgst' => '0.0',
                    'sgst' => '0.0',
                    'igst' => '0.0',
                    'ugst' => '0.0',
                    'description' => 'GST Free',
                ),
                array(
                    'id' => '2',
                    'rate' => '0.250',
                    'cgst' => '0.125',
                    'sgst' => '0.125',
                    'igst' => '0.250',
                    'ugst' => '0.125',
                    'description' => '0.25% GST Slab',
                ),
                array(
                    'id' => '3',
                    'rate' => '3.0',
                    'cgst' => '1.5',
                    'sgst' => '1.5',
                    'igst' => '3.0',
                    'ugst' => '1.5',
                    'description' => '3% GST Slab',
                ),
                array(
                    'id' => '4',
                    'rate' => '5.0',
                    'cgst' => '2.5',
                    'sgst' => '2.5',
                    'igst' => '5.0',
                    'ugst' => '2.5',
                    'description' => '5% GST Slab',
                ),
                array(
                    'id' => '5',
                    'rate' => '12.0',
                    'cgst' => '6.0',
                    'sgst' => '6.0',
                    'igst' => '12.0',
                    'ugst' => '6.0',
                    'description' => '12% GST Slab',
                ),
                array(
                    'id' => '6',
                    'rate' => '18.0',
                    'cgst' => '9.0',
                    'sgst' => '9.0',
                    'igst' => '18.0',
                    'ugst' => '9.0',
                    'description' => '18% GST Slab',
                ),
                array(
                    'id' => '7',
                    'rate' => '28.0',
                    'cgst' => '14.0',
                    'sgst' => '14.0',
                    'igst' => '28.0',
                    'ugst' => '14.0',
                    'description' => '28% GST Slab',
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
        //Drop gst Table
        Schema::drop('gst');
    }
}
