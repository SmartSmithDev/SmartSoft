<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create states Table
        Schema::create('states', function(Blueprint $table)
        {
            $table->integer('id')->primary();
            $table->string('name', 30);
            $table->string('state_tax_code', 50);
            $table->string('iso_code', 10);
            $table->string('state_code', 5);
            $table->enum('st_ut', array('NA','ST','UT'))->default('NA');
        });

        //Insert into states Table
        DB::table('states')->insert(
            array(
                array(
                  'id'=>'0' , 
                  'name'=>'Unknown' , 
                  'state_tax_code'=>'Unknown' , 
                  'iso_code'=>'NA' , 
                  'state_code'=>'NA' , 
                  'st_ut'=>'NA' , 
                ),

                array(
                  'id'=>'1' , 
                  'name'=>'Jammu and Kashmir' , 
                  'state_tax_code'=>'01-Jammu & Kashmir' , 
                  'iso_code'=>'IN-JK' , 
                  'state_code'=>'JK' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'2' , 
                  'name'=>'Himachal Pradesh' , 
                  'state_tax_code'=>'02-Himachal Pradesh' , 
                  'iso_code'=>'IN-HP' , 
                  'state_code'=>'HP' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'3' , 
                  'name'=>'Punjab' , 
                  'state_tax_code'=>'03-Punjab' , 
                  'iso_code'=>'IN-PB' , 
                  'state_code'=>'PB' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'4' , 
                  'name'=>'Chandigarh' , 
                  'state_tax_code'=>'04-Chandigarh' , 
                  'iso_code'=>'IN-CH' , 
                  'state_code'=>'CH' , 
                  'st_ut'=>'UT' , 
                ),

                array(
                  'id'=>'5' , 
                  'name'=>'Uttarakhand' , 
                  'state_tax_code'=>'05-Uttarakhand' , 
                  'iso_code'=>'IN-UT' , 
                  'state_code'=>'UT' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'6' , 
                  'name'=>'Haryana' , 
                  'state_tax_code'=>'06-Haryana' , 
                  'iso_code'=>'IN-HR' , 
                  'state_code'=>'HR' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'7' , 
                  'name'=>'Delhi' , 
                  'state_tax_code'=>'07-Delhi' , 
                  'iso_code'=>'IN-DL' , 
                  'state_code'=>'DL' , 
                  'st_ut'=>'UT' , 
                ),

                array(
                  'id'=>'8' , 
                  'name'=>'Rajasthan' , 
                  'state_tax_code'=>'08-Rajasthan' , 
                  'iso_code'=>'IN-RJ' , 
                  'state_code'=>'RJ' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'9' , 
                  'name'=>'Uttar Pradesh' , 
                  'state_tax_code'=>'09-Uttar Pradesh' , 
                  'iso_code'=>'IN-UP' , 
                  'state_code'=>'UP' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'10' , 
                  'name'=>'Bihar' , 
                  'state_tax_code'=>'10-Bihar' , 
                  'iso_code'=>'IN-BR' , 
                  'state_code'=>'BR' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'11' , 
                  'name'=>'Sikkim' , 
                  'state_tax_code'=>'11-Sikkim' , 
                  'iso_code'=>'IN-SK' , 
                  'state_code'=>'SK' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'12' , 
                  'name'=>'Arunachal Pradesh' , 
                  'state_tax_code'=>'12-Arunachal Pradesh' , 
                  'iso_code'=>'IN-AR' , 
                  'state_code'=>'AR' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'13' , 
                  'name'=>'Nagaland' , 
                  'state_tax_code'=>'13-Nagaland' , 
                  'iso_code'=>'IN-NL' , 
                  'state_code'=>'NL' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'14' , 
                  'name'=>'Manipur' , 
                  'state_tax_code'=>'14-Manipur' , 
                  'iso_code'=>'IN-MN' , 
                  'state_code'=>'MN' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'15' , 
                  'name'=>'Mizoram' , 
                  'state_tax_code'=>'15-Mizoram' , 
                  'iso_code'=>'IN-MZ' , 
                  'state_code'=>'MZ' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'16' , 
                  'name'=>'Tripura' , 
                  'state_tax_code'=>'16-Tripura' , 
                  'iso_code'=>'IN-TR' , 
                  'state_code'=>'TR' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'17' , 
                  'name'=>'Meghalaya' , 
                  'state_tax_code'=>'17-Meghalaya' , 
                  'iso_code'=>'IN-ML' , 
                  'state_code'=>'ML' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'18' , 
                  'name'=>'Assam' , 
                  'state_tax_code'=>'18-Assam' , 
                  'iso_code'=>'IN-AS' , 
                  'state_code'=>'AS' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'19' , 
                  'name'=>'West Bengal' , 
                  'state_tax_code'=>'19-West Bengal' , 
                  'iso_code'=>'IN-WB' , 
                  'state_code'=>'WB' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'20' , 
                  'name'=>'Jharkhand' , 
                  'state_tax_code'=>'20-Jharkhand' , 
                  'iso_code'=>'IN-JH' , 
                  'state_code'=>'JH' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'21' , 
                  'name'=>'Odisha' , 
                  'state_tax_code'=>'21-Odisha' , 
                  'iso_code'=>'IN-OR' , 
                  'state_code'=>'OR' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'22' , 
                  'name'=>'Chhattisgarh' , 
                  'state_tax_code'=>'22-Chhattisgarh' , 
                  'iso_code'=>'IN-CT' , 
                  'state_code'=>'CT' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'23' , 
                  'name'=>'Madhya Pradesh' , 
                  'state_tax_code'=>'23-Madhya Pradesh' , 
                  'iso_code'=>'IN-MP' , 
                  'state_code'=>'MP' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'24' , 
                  'name'=>'Gujarat' , 
                  'state_tax_code'=>'24-Gujarat' , 
                  'iso_code'=>'IN-GJ' , 
                  'state_code'=>'GJ' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'25' , 
                  'name'=>'Daman and Diu' , 
                  'state_tax_code'=>'25-Daman & Diu' , 
                  'iso_code'=>'IN-DD' , 
                  'state_code'=>'DD' , 
                  'st_ut'=>'UT' , 
                ),

                array(
                  'id'=>'26' , 
                  'name'=>'Dadra and Nagar Haveli' , 
                  'state_tax_code'=>'26-Dadra & Nagar Haveli' , 
                  'iso_code'=>'IN-DN' , 
                  'state_code'=>'DN' , 
                  'st_ut'=>'UT' , 
                ),

                array(
                  'id'=>'27' , 
                  'name'=>'Maharashtra' , 
                  'state_tax_code'=>'27-Maharashtra' , 
                  'iso_code'=>'IN-MH' , 
                  'state_code'=>'MH' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'29' , 
                  'name'=>'Karnataka' , 
                  'state_tax_code'=>'29-Karnataka' , 
                  'iso_code'=>'IN-KA' , 
                  'state_code'=>'KA' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'30' , 
                  'name'=>'Goa' , 
                  'state_tax_code'=>'30-Goa' , 
                  'iso_code'=>'IN-GA' , 
                  'state_code'=>'GA' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'31' , 
                  'name'=>'Lakshadweep' , 
                  'state_tax_code'=>'31-Lakshdweep' , 
                  'iso_code'=>'IN-LD' , 
                  'state_code'=>'LD' , 
                  'st_ut'=>'UT' , 
                ),

                array(
                  'id'=>'32' , 
                  'name'=>'Kerala' , 
                  'state_tax_code'=>'32-Kerala' , 
                  'iso_code'=>'IN-KL' , 
                  'state_code'=>'KL' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'33' , 
                  'name'=>'Tamil Nadu' , 
                  'state_tax_code'=>'33-Tamil Nadu' , 
                  'iso_code'=>'IN-TN' , 
                  'state_code'=>'TN' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'34' , 
                  'name'=>'Puducherry' , 
                  'state_tax_code'=>'34-Pondicherry' , 
                  'iso_code'=>'IN-PY' , 
                  'state_code'=>'PY' , 
                  'st_ut'=>'UT' , 
                ),

                array(
                  'id'=>'35' , 
                  'name'=>'Andaman and Nicobar Islands' , 
                  'state_tax_code'=>'35-Andaman & Nicobar Islands' , 
                  'iso_code'=>'IN-AN' , 
                  'state_code'=>'AN' , 
                  'st_ut'=>'UT' , 
                ),

                array(
                  'id'=>'36' , 
                  'name'=>'Telangana' , 
                  'state_tax_code'=>'36-Telengana' , 
                  'iso_code'=>'IN-TG' , 
                  'state_code'=>'TG' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'37' , 
                  'name'=>'Andhra Pradesh' , 
                  'state_tax_code'=>'37-Andhra Pradesh' , 
                  'iso_code'=>'IN-AP' , 
                  'state_code'=>'AP' , 
                  'st_ut'=>'ST' , 
                ),

                array(
                  'id'=>'98' , 
                  'name'=>'Other Territory' , 
                  'state_tax_code'=>'98 - Other Territory' , 
                  'iso_code'=>'IN-OT' , 
                  'state_code'=>'OT' , 
                  'st_ut'=>'ST' , 
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
        //Drop states Table
        Schema::drop('states');
    }
}
