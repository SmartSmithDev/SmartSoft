<?php

namespace App\Traits;

use App\Models\Inventory\Inventory;
use App\Models\Company\CompanyBranch;

trait InventoryTrait
{

    
	public function existInInventory(){
		if(Inventory::where('sku',$this->sku)->count()==0){
			return true;
		}
		return false;
	}




	public function getQuantity(){
		$quantity=Inventory::where('sku',$this->sku)->pluck('quantity')->first();
		return $quantity;
	}




	public static function findBySku($sku){
		if($sku){
			$item=Inventory::where('sku',$sku)->get()->first();
			return $item;
		}
		return null;
	} 



	public function isInStock(){
		if($this->existInInventory()){
			if($this->getQuantity()>0){
				return true;
			}
		}
		return false;
	}


	public function getState(){
		$state=Inventory::where('sku',$this->sku)->pluck('state')->first();
		return $state;
	}


	public function getBranchName(){
		$branch_id=$this->getBranchId();
		$company_id=$this->getCompanyId();
		$branch=CompanyBranch::where(['id','=',$branch_id],['company_id','=',$company_id])->pluck('branch_name')->first();
		return $branch;
	}



	public function getBranchId(){
		$branch_id=Inventory::where("sku",$this->sku)->pluck('company_branch_id')->first();
		return $branch_id;
	}




	public function getCompanyId(){
		$company_id=Inventory::where("sku",$this->sku)->pluck('company_id')->first();
		return $company_id;
	}




	public function insertIntoInventory($sku=null,$company_id,$branch_id,$state,$quantity=0){
		if($sku){
			$sku=$this->sku;
		}
		if($this->existInInventory()){
			return false;
		}
		$insert=["sku"=>$sku,"company_id"=>$company_id,"company_branch_id"=>$branch_id,"state"=>$state,"quantity"=>$quantity];
		$item_in_inventory=Inventory::create($insert);
		if($item_in_inventory->id){
			return true;
		}
		return false;
	} 

}