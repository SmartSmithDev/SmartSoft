<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateunitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Create Units Table
		Schema::create('units', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('unit_code', 5)->unique('uk_unit');
			$table->string('unit', 50);
		});

		//Insert into units table
		DB::table('units')->insert(
            array(
        		array(
				  'id'=>'0' , 
				  'unit_code'=>'NA' , 
				  'unit'=>'Unknown' , 
				),

				array(
				  'id'=>'1' , 
				  'unit_code'=>'AMP' , 
				  'unit'=>'AMPULES' , 
				),

				array(
				  'id'=>'2' , 
				  'unit_code'=>'BAG' , 
				  'unit'=>'BAG' , 
				),

				array(
				  'id'=>'3' , 
				  'unit_code'=>'BGS' , 
				  'unit'=>'BAGS' , 
				),

				array(
				  'id'=>'4' , 
				  'unit_code'=>'BLS' , 
				  'unit'=>'BAILS' , 
				),

				array(
				  'id'=>'5' , 
				  'unit_code'=>'BTL' , 
				  'unit'=>'BOTTLES' , 
				),

				array(
				  'id'=>'6' , 
				  'unit_code'=>'BOU' , 
				  'unit'=>'BOU' , 
				),

				array(
				  'id'=>'7' , 
				  'unit_code'=>'BOX' , 
				  'unit'=>'BOXES' , 
				),

				array(
				  'id'=>'8' , 
				  'unit_code'=>'BKL' , 
				  'unit'=>'BUCKLES' , 
				),

				array(
				  'id'=>'9' , 
				  'unit_code'=>'BLK' , 
				  'unit'=>'BULK' , 
				),

				array(
				  'id'=>'10' , 
				  'unit_code'=>'BUN' , 
				  'unit'=>'BUNCHES' , 
				),

				array(
				  'id'=>'11' , 
				  'unit_code'=>'BDL' , 
				  'unit'=>'BUNDLES' , 
				),

				array(
				  'id'=>'12' , 
				  'unit_code'=>'CAN' , 
				  'unit'=>'CANS' , 
				),

				array(
				  'id'=>'13' , 
				  'unit_code'=>'CTN' , 
				  'unit'=>'CARTONS' , 
				),

				array(
				  'id'=>'14' , 
				  'unit_code'=>'CAS' , 
				  'unit'=>'CASES' , 
				),

				array(
				  'id'=>'15' , 
				  'unit_code'=>'CMS' , 
				  'unit'=>'CENTIMETER' , 
				),

				array(
				  'id'=>'16' , 
				  'unit_code'=>'CHI' , 
				  'unit'=>'CHEST' , 
				),

				array(
				  'id'=>'17' , 
				  'unit_code'=>'CLS' , 
				  'unit'=>'COILS' , 
				),

				array(
				  'id'=>'18' , 
				  'unit_code'=>'COL' , 
				  'unit'=>'COLLIES' , 
				),

				array(
				  'id'=>'19' , 
				  'unit_code'=>'CRI' , 
				  'unit'=>'CRATES' , 
				),

				array(
				  'id'=>'20' , 
				  'unit_code'=>'CCM' , 
				  'unit'=>'CUBIC CENTIMETER' , 
				),

				array(
				  'id'=>'21' , 
				  'unit_code'=>'CIN' , 
				  'unit'=>'CUBIC INCHES' , 
				),

				array(
				  'id'=>'22' , 
				  'unit_code'=>'CBM' , 
				  'unit'=>'CUBIC METER' , 
				),

				array(
				  'id'=>'23' , 
				  'unit_code'=>'CQM' , 
				  'unit'=>'CUBIC METERS' , 
				),

				array(
				  'id'=>'24' , 
				  'unit_code'=>'CYL' , 
				  'unit'=>'CYLINDER' , 
				),

				array(
				  'id'=>'25' , 
				  'unit_code'=>'SDM' , 
				  'unit'=>'DECAMETER SQUARE' , 
				),

				array(
				  'id'=>'26' , 
				  'unit_code'=>'DAY' , 
				  'unit'=>'DAYS' , 
				),

				array(
				  'id'=>'27' , 
				  'unit_code'=>'DOZ' , 
				  'unit'=>'DOZEN' , 
				),

				array(
				  'id'=>'28' , 
				  'unit_code'=>'DRM' , 
				  'unit'=>'DRUMS' , 
				),

				array(
				  'id'=>'29' , 
				  'unit_code'=>'FTS' , 
				  'unit'=>'FEET' , 
				),

				array(
				  'id'=>'30' , 
				  'unit_code'=>'FLK' , 
				  'unit'=>'FLASKS' , 
				),

				array(
				  'id'=>'31' , 
				  'unit_code'=>'GMS' , 
				  'unit'=>'GRAMS' , 
				),

				array(
				  'id'=>'32' , 
				  'unit_code'=>'TON' , 
				  'unit'=>'GREAT BRITAIN TON' , 
				),

				array(
				  'id'=>'33' , 
				  'unit_code'=>'GGR' , 
				  'unit'=>'GREAT GROSS' , 
				),

				array(
				  'id'=>'34' , 
				  'unit_code'=>'GRS' , 
				  'unit'=>'GROSS' , 
				),

				array(
				  'id'=>'35' , 
				  'unit_code'=>'GYD' , 
				  'unit'=>'GROSS YARDS' , 
				),

				array(
				  'id'=>'36' , 
				  'unit_code'=>'HBK' , 
				  'unit'=>'HABBUCK' , 
				),

				array(
				  'id'=>'37' , 
				  'unit_code'=>'HKS' , 
				  'unit'=>'HANKS' , 
				),

				array(
				  'id'=>'38' , 
				  'unit_code'=>'HRS' , 
				  'unit'=>'HOURS' , 
				),

				array(
				  'id'=>'39' , 
				  'unit_code'=>'INC' , 
				  'unit'=>'INCHES' , 
				),

				array(
				  'id'=>'40' , 
				  'unit_code'=>'JTA' , 
				  'unit'=>'JOTTA' , 
				),

				array(
				  'id'=>'41' , 
				  'unit_code'=>'KGS' , 
				  'unit'=>'KILOGRAMS' , 
				),

				array(
				  'id'=>'42' , 
				  'unit_code'=>'KLR' , 
				  'unit'=>'KILOLITER' , 
				),

				array(
				  'id'=>'43' , 
				  'unit_code'=>'KME' , 
				  'unit'=>'KILOMETERS' , 
				),

				array(
				  'id'=>'44' , 
				  'unit_code'=>'LTR' , 
				  'unit'=>'LITERS' , 
				),

				array(
				  'id'=>'45' , 
				  'unit_code'=>'LOG' , 
				  'unit'=>'LOGS' , 
				),

				array(
				  'id'=>'46' , 
				  'unit_code'=>'LOT' , 
				  'unit'=>'LOTS' , 
				),

				array(
				  'id'=>'47' , 
				  'unit_code'=>'MTR' , 
				  'unit'=>'METER' , 
				),

				array(
				  'id'=>'48' , 
				  'unit_code'=>'MTS' , 
				  'unit'=>'METRIC TON' , 
				),

				array(
				  'id'=>'49' , 
				  'unit_code'=>'MGS' , 
				  'unit'=>'MILLIGRAMS' , 
				),

				array(
				  'id'=>'50' , 
				  'unit_code'=>'MLT' , 
				  'unit'=>'MILLILITRE' , 
				),

				array(
				  'id'=>'51' , 
				  'unit_code'=>'MMT' , 
				  'unit'=>'MILLIMETER' , 
				),

				array(
				  'id'=>'52' , 
				  'unit_code'=>'NONE' , 
				  'unit'=>'NOT CHOSEN' , 
				),

				array(
				  'id'=>'53' , 
				  'unit_code'=>'NOS' , 
				  'unit'=>'NUMBERS' , 
				),

				array(
				  'id'=>'54' , 
				  'unit_code'=>'ODD' , 
				  'unit'=>'ODDS' , 
				),

				array(
				  'id'=>'55' , 
				  'unit_code'=>'PAC' , 
				  'unit'=>'PACKS' , 
				),

				array(
				  'id'=>'56' , 
				  'unit_code'=>'PAI' , 
				  'unit'=>'PAILS' , 
				),

				array(
				  'id'=>'57' , 
				  'unit_code'=>'PRS' , 
				  'unit'=>'PAIRS' , 
				),

				array(
				  'id'=>'58' , 
				  'unit_code'=>'PLT' , 
				  'unit'=>'PALLETS' , 
				),

				array(
				  'id'=>'59' , 
				  'unit_code'=>'PCS' , 
				  'unit'=>'PIECES' , 
				),

				array(
				  'id'=>'60' , 
				  'unit_code'=>'LBS' , 
				  'unit'=>'POUNDS' , 
				),

				array(
				  'id'=>'61' , 
				  'unit_code'=>'QTL' , 
				  'unit'=>'QUINTAL' , 
				),

				array(
				  'id'=>'62' , 
				  'unit_code'=>'REL' , 
				  'unit'=>'REELS' , 
				),

				array(
				  'id'=>'63' , 
				  'unit_code'=>'ROL' , 
				  'unit'=>'ROLLS' , 
				),

				array(
				  'id'=>'64' , 
				  'unit_code'=>'SET' , 
				  'unit'=>'SETS' , 
				),

				array(
				  'id'=>'65' , 
				  'unit_code'=>'SHT' , 
				  'unit'=>'SHEETS' , 
				),

				array(
				  'id'=>'66' , 
				  'unit_code'=>'SLB' , 
				  'unit'=>'SLABS' , 
				),

				array(
				  'id'=>'67' , 
				  'unit_code'=>'SQF' , 
				  'unit'=>'SQUARE FEET' , 
				),

				array(
				  'id'=>'68' , 
				  'unit_code'=>'SQI' , 
				  'unit'=>'SQUARE INCHES' , 
				),

				array(
				  'id'=>'69' , 
				  'unit_code'=>'SQC' , 
				  'unit'=>'SQUARE CENTIMETERS' , 
				),

				array(
				  'id'=>'70' , 
				  'unit_code'=>'SQM' , 
				  'unit'=>'SQUARE METER' , 
				),

				array(
				  'id'=>'71' , 
				  'unit_code'=>'SQY' , 
				  'unit'=>'SQUARE YARDS' , 
				),

				array(
				  'id'=>'72' , 
				  'unit_code'=>'BLO' , 
				  'unit'=>'STEEL BLOCKS' , 
				),

				array(
				  'id'=>'73' , 
				  'unit_code'=>'TBL' , 
				  'unit'=>'TABLES' , 
				),

				array(
				  'id'=>'74' , 
				  'unit_code'=>'TBS' , 
				  'unit'=>'TABLETS' , 
				),

				array(
				  'id'=>'75' , 
				  'unit_code'=>'TGM' , 
				  'unit'=>'TEN GROSS' , 
				),

				array(
				  'id'=>'76' , 
				  'unit_code'=>'THD' , 
				  'unit'=>'THOUSANDS' , 
				),

				array(
				  'id'=>'77' , 
				  'unit_code'=>'TIN' , 
				  'unit'=>'TINS' , 
				),

				array(
				  'id'=>'78' , 
				  'unit_code'=>'TOL' , 
				  'unit'=>'TOLA' , 
				),

				array(
				  'id'=>'79' , 
				  'unit_code'=>'TRK' , 
				  'unit'=>'TRUNK' , 
				),

				array(
				  'id'=>'80' , 
				  'unit_code'=>'TUB' , 
				  'unit'=>'TUBES' , 
				),

				array(
				  'id'=>'81' , 
				  'unit_code'=>'UNT' , 
				  'unit'=>'unitS' , 
				),

				array(
				  'id'=>'82' , 
				  'unit_code'=>'UGS' , 
				  'unit'=>'US GALLONS' , 
				),

				array(
				  'id'=>'83' , 
				  'unit_code'=>'VLS' , 
				  'unit'=>'Vials' , 
				),

				array(
				  'id'=>'84' , 
				  'unit_code'=>'CSK' , 
				  'unit'=>'WOODEN CASES' , 
				),

				array(
				  'id'=>'85' , 
				  'unit_code'=>'YDS' , 
				  'unit'=>'YARDS' , 
				),
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
		//Drop Units Table
		Schema::drop('units');
	}

}
