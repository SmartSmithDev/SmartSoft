<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCreditDebitNoteProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('credit_debit_note_items', function(Blueprint $table)
		{
			$table->foreign('gst_id', 'fk_cdn_prod_gst_id')->references('id')->on('gst')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('hsn', 'fk_cdn_prod_hsn')->references('hsn')->on('hsn')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('item_id', 'fk_cdn_prod_item_id')->references('id')->on('items')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('note_id', 'fk_cdn_prod_note_id')->references('id')->on('credit_debit_notes')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('unit_id', 'fk_cdn_prod_unit_id')->references('id')->on('units')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('credit_debit_note_items', function(Blueprint $table)
		{
			$table->dropForeign('fk_cdn_prod_gst_id');
			$table->dropForeign('fk_cdn_prod_hsn');
			$table->dropForeign('fk_cdn_prod_item_id');
			$table->dropForeign('fk_cdn_prod_note_id');
			$table->dropForeign('fk_cdn_prod_unit_id');
		});
	}

}
