<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditDebitNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create creditdebitnote Table
        Schema::create('credit_debit_notes', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->string('note_number', 30);
            $table->date('note_date');
            $table->enum('note_type', array('Credit','Debit'));
            $table->enum('note_reason', array('01-Sales Return','02-Post Sale Discount','03-Deficiency in services','04-Correction in Invoice','05-Change in POS','06-Finalization of Provisional assessment','07-Others'))->default('07-Others');
            $table->string('invoice_number', 30);
            $table->date('invoice_date');
            $table->integer('vendor_id');
            $table->integer('supplier_state_id');
            $table->integer('supply_state_id');
            $table->decimal('total_taxable_value', 15 , 2);
            $table->decimal('total_discount', 15 , 2);
            $table->decimal('cgst', 15 , 2);
            $table->decimal('sgst', 15 , 2);
            $table->decimal('igst', 15 , 2);
            $table->decimal('ugst', 15 , 2);
            $table->decimal('cess', 15 , 2);
            $table->decimal('total_tax', 15 , 2);
            $table->decimal('round_off', 15 , 2);
            $table->decimal('total_amount', 15 , 2);
            $table->enum('reverse_charge', array('N','Y'))->default('N');
            $table->text('notes');
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
        //Remove credit_debit_note Table
        Schema::drop('credit_debit_notes');
    }
}
