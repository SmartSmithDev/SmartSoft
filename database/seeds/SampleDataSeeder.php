<?php

use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //companies
        DB::table('companies')->insert(
            array(
		        array(
				  'id'=>'1' , 
				  'name'=>'main company' , 
				  'pan'=>'pannumber' , 
				  'created_at'=>'2018-01-26 00:00:00' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				)
		    )
        );


		//company_bank_accounts
		DB::table('company_bank_accounts')->insert(
            array(
				array(
				  'id'=>'1' , 
				  'company_id'=>'1' , 
				  'account_identifier'=>'idofaccount' , 
				  'entity_name'=>'accountcompany' , 
				  'holder_name'=>'holderperson' , 
				  'bank_name'=>'hdfc' , 
				  'account_number'=>'0000111122223333' , 
				  'ifsc_code'=>'hdfc000232' , 
				  'notes'=>'this is bank account' , 
				  'created_at'=>'2018-01-26 00:00:00' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'id'=>'2' , 
				  'company_id'=>'1' , 
				  'account_identifier'=>'newidofaccount' , 
				  'entity_name'=>'otheraccountcompany' , 
				  'holder_name'=>'someholderperson' , 
				  'bank_name'=>'hdfc' , 
				  'account_number'=>'000011112222333344' , 
				  'ifsc_code'=>'hdfc000232' , 
				  'notes'=>'this is another bank account' , 
				  'created_at'=>'2018-01-26 00:00:00' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				)
		    )
        );


		//company_gstin
		DB::table('company_gstin')->insert(
            array(
				array(
				  'id'=>'1' , 
				  'gstin'=>'27BIMPB4921A1ZG' , 
				  'company_id'=>'1' , 
				  'state_id'=>'27' , 
				  'created_at'=>'2018-01-26 00:00:00' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				)
		    )
        );


		//company_branches
		DB::table('company_branches')->insert(
            array(
				array(
				  'id'=>'1' , 
				  'company_id'=>'1' , 
				  'gstin_id'=>'1' , 
				  'branch_name'=>'MainBranch' , 
				  'phone'=>'00000000' , 
				  'email_id'=>'branchmail@company.com' , 
				  'address'=>'this is a branch address' , 
				  'city'=>'anycity' , 
				  'state_id'=>'27' , 
				  'country'=>'India' , 
				  'pin_code'=>'421001' , 
				  'created_at'=>'2018-01-26 00:00:00' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				)
		    )
        );

		//customers
		DB::table('customers')->insert(
            array(
				array(
				  'id'=>'1' , 
				  'name'=>'OurCustomer' , 
				  'customer_type'=>'GST Registered' , 
				  'gstin'=>'27BIMPB4559A1ZG' , 
				  'pan'=>'BIMPB4559A' , 
				  'phone'=>'0000111122' , 
				  'email_id'=>'customermail@321' , 
				  'address'=>'vadsklvalsvany address' , 
				  'city'=>'anyone' , 
				  'state_id'=>'27' , 
				  'country'=>'INDIA' , 
				  'pin_code'=>'401234' , 
				  'website'=>'website@com' , 
				  'business_type'=>'Trader' , 
				  'created_at'=>'2018-01-26 00:00:00' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				)
		    )
        );

		//customer_accounts
		DB::table('customer_accounts')->insert(
            array(
				array(
				  'id'=>'1' , 
				  'customer_id'=>'1' , 
				  'beneficiary_name'=>'customer' , 
				  'account_number'=>'000022224444666' , 
				  'beneficiary_address'=>'address of our important customer' , 
				  'beneficiary_bank'=>'hdfc' , 
				  'beneficiary_bank_address'=>'hdfc mumbai' , 
				  'ifsc_Code'=>'hdfc0001' , 
				  'bank_code'=>'001' , 
				  'branch_code'=>'110' , 
				  'account_type'=>'Company Account' , 
				  'created_at'=>'2018-01-26 00:00:00' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				)
		    )
        );

        //hsn
		DB::table('hsn')->insert(
            array(
				array(
				  'hsn'=>'1010101' , 
				  'gst_id'=>'4' , 
				  'cess_id'=>'1' , 
				  'item_type'=>'Unknown' , 
				  'description'=>'hsn of item' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'hsn'=>'1010102' , 
				  'gst_id'=>'3' , 
				  'cess_id'=>'1' , 
				  'item_type'=>'Unknown' , 
				  'description'=>'hsn of item' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'hsn'=>'1010103' , 
				  'gst_id'=>'2' , 
				  'cess_id'=>'1' , 
				  'item_type'=>'Unknown' , 
				  'description'=>'hsn of item' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'hsn'=>'1010104' , 
				  'gst_id'=>'4' , 
				  'cess_id'=>'1' , 
				  'item_type'=>'Unknown' , 
				  'description'=>'hsn of item' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'hsn'=>'1010105' , 
				  'gst_id'=>'1' , 
				  'cess_id'=>'1' , 
				  'item_type'=>'Unknown' , 
				  'description'=>'hsn of item' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				)
		    )
        );



		//items
		DB::table('items')->insert(
            array(
				array(
				  'id'=>'1' , 
				  'sku'=>'skuprod1' , 
				  'name'=>'iTEM1' , 
				  'type'=>'Goods' , 
				  'hsn'=>'1010101' , 
				  'unit_id'=>'17' , 
				  'details'=>'' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'id'=>'2' , 
				  'sku'=>'skuprod2' , 
				  'name'=>'iTEM2' , 
				  'type'=>'Goods' , 
				  'hsn'=>'1010101' , 
				  'unit_id'=>'17' , 
				  'details'=>'' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'id'=>'3' , 
				  'sku'=>'skuprod3' , 
				  'name'=>'iTEM3' , 
				  'type'=>'Goods' , 
				  'hsn'=>'1010101' , 
				  'unit_id'=>'17' , 
				  'details'=>'' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'id'=>'4' , 
				  'sku'=>'skuprod4' , 
				  'name'=>'iTEM4' , 
				  'type'=>'Goods' , 
				  'hsn'=>'1010101' , 
				  'unit_id'=>'17' , 
				  'details'=>'' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'id'=>'5' , 
				  'sku'=>'skuprod5' , 
				  'name'=>'iTEM5' , 
				  'type'=>'Goods' , 
				  'hsn'=>'1010101' , 
				  'unit_id'=>'17' , 
				  'details'=>'' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'id'=>'6' , 
				  'sku'=>'skuprod6' , 
				  'name'=>'iTEM6' , 
				  'type'=>'Goods' , 
				  'hsn'=>'1010101' , 
				  'unit_id'=>'17' , 
				  'details'=>'' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'id'=>'7' , 
				  'sku'=>'skuprod7' , 
				  'name'=>'iTEM7' , 
				  'type'=>'Goods' , 
				  'hsn'=>'1010101' , 
				  'unit_id'=>'17' , 
				  'details'=>'' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				),

				array(
				  'id'=>'8' , 
				  'sku'=>'skuprod18' , 
				  'name'=>'iTEM8' , 
				  'type'=>'Goods' , 
				  'hsn'=>'1010101' , 
				  'unit_id'=>'17' , 
				  'details'=>'' , 
				  'created_at'=>'' , 
				  'updated_at'=>'' , 
				  'deleted_at'=>'' , 
				)
		    )
        );



    }
}
