<?php 
namespace App\libraries;
use App\Models\Tax\Cess;
use App\Models\Tax\Gst;
use App\Models\Setting\State;
use App\Models\Item\Item;
use App\Models\Tax\Hsn;

class GstCalculator {

	function getTax($ShipToStateCode , $ShipFromStateCode , $GSTID , $cessID = 0 , $amount = 100 , $type = 'array')
	{
		$gst = array(
		'CGST' => $this->getCGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'SGST' => $this->getSGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'IGST' => $this->getIGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'UGST' => $this->getUGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'Cess' => $cess = $this->getCess($cessID , $amount),
		'Total GST' => $totalGST =  $this->getTotalGST($GSTID , $amount),
		'Total Tax' => $totalGST + $cess,
		'Tax Inclusive' => $amount + $totalGST + $cess
		);
		if($type == 'array')
			return $gst;
		else if($type == 'json')
			return json_encode($gst);
	}

	function getReverseTax($ShipToStateCode , $ShipFromStateCode , $GSTID , $cessID = 0 , $amount = 100 , $type = 'array')
	{
		$gst = array(
		'CGST' => $this->getReverseCGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'SGST' => $this->getReverseSGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'IGST' => $this->getReverseIGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'UGST' => $this->getReverseUGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'Cess' => $cess = $this->getReverseCess($cessID , $amount),
		'Total GST' => $totalGST = $this->getTotalReverseGST($GSTID , $amount),
		'Total Tax' => $totalGST + $cess,
		'Tax Exclusive' => $amount - $totalGST - $cess
		);
		if($type == 'array')
			return $gst;
		else if($type == 'json')
			return json_encode($gst);
	}

	function getGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount = 100 , $type = 'array')
	{
		$gst = array(
		'CGST' => $this->getCGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'SGST' => $this->getSGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'IGST' => $this->getIGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'UGST' => $this->getUGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'Total GST' => $totalGST =  $this->getTotalGST($GSTID , $amount),
		'Tax Inclusive' => $amount + $totalGST
		);
		if($type == 'array')
			return $gst;
		else if($type == 'json')
			return json_encode($gst);
	}

	function getReverseGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount = 100 , $type = 'array')
	{
		$gst = array(
		'CGST' => $this->getReverseCGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'SGST' => $this->getReverseSGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'IGST' => $this->getReverseIGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'UGST' => $this->getReverseUGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'Total GST' => $totalGST = $this->getTotalReverseGST($GSTID , $amount),
		'Tax Exclusive' => $amount - $totalGST
		);
		if($type == 'array')
			return $gst;
		else if($type == 'json')
			return json_encode($gst);
	}

	function getGSTFromPID($ShipToStateCode , $ShipFromStateCode , $ProductID , $amount = 100 , $type = 'array')
	{
		//Get HSN Code of Product
		//$HSN = getAttribute('Item Master' , 'HSN Code' , 'Item ID' , $ProductID);
		$HSN = Item::find($ProductID)->hsn;
		//Get GST ID from HSN Code 
		//$GSTID = getAttribute('HSN Directory' , 'GST ID' , 'HSN Code' , $HSN);
		$GSTID = Hsn::find($HSN)->gst_id;
		
		$gst = array(
		'CGST' => $this->getCGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'SGST' => $this->getSGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'IGST' => $this->getIGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'UGST' => $this->getUGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'Total GST' => $totalGST =  $this->getTotalGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'Tax Inclusive' => $amount + $totalGST
		);
		if($type == 'array')
			return $gst;
		else if($type == 'json')
			return json_encode($gst);
	}

	function getReverseGSTFromPID($ShipToStateCode , $ShipFromStateCode , $ProductID , $amount = 100 , $type = 'array')
	{
		//Get HSN Code of Product
		//$HSN = getAttribute('Item Master' , 'HSN Code' , 'Item ID' , $ProductID);
		$HSN = Item::find($ProductID)->hsn;
		//Get GST ID from HSN Code 
		//$GSTID = getAttribute('HSN Directory' , 'GST ID' , 'HSN Code' , $HSN);
		$GSTID = Hsn::find($HSN)->gst_id;
		$gst = array(
		'CGST' => $this->getReverseCGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'SGST' => $this->getReverseSGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'IGST' => $this->getReverseIGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'UGST' => $this->getReverseUGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount),
		'Total GST' => $totalGST = $this->getTotalReverseGST($ShipToStateCode , $GSTID , $amount),
		'Tax Exclusive' => $amount - $totalGST
		);
		if($type == 'array')
			return $gst;
		else if($type == 'json')
			return json_encode($gst);
	}


	function getCGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount = 100)
	{
		if($ShipFromStateCode == $ShipToStateCode) {
			// Get CGST Percentage on product
			// $CGSTRate = getAttribute('GST Class' , 'CGST' , 'GST ID' , $GSTID);
			$CGSTRate = Gst::find($GSTID)->cgst; 
			$CGSTAmount = $CGSTRate/100 * $amount ; // Get CGST Amount
		}
		else
			$CGSTAmount = 0;
			
		return $CGSTAmount;
	}

	function getReverseCGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount = 100)
	{
		if($ShipFromStateCode == $ShipToStateCode) {
			// Get CGST Percentage on product
			// $CGSTRate = getAttribute('GST Class' , 'CGST' , 'GST ID' , $GSTID);
			$CGSTRate = Gst::find($GSTID)->cgst;
			$CGSTAmount =  $amount - (($amount) / (1 + ($CGSTRate / 100)));	
		}
		else
			$CGSTAmount = 0;
			
		return $CGSTAmount;
	}

	function getSGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount = 100)
	{
		//Get State or Union Territiry
		$STUT = State::find($ShipToStateCode)->st_ut;
		if($ShipFromStateCode == $ShipToStateCode and $STUT == "ST" and $STUT != "NA") {
			// Get SGST Percentage on product
			//$SGSTRate = getAttribute('GST Class' , 'SGST' , 'GST ID' , $GSTID);
			$SGSTRate = Gst::find($GSTID)->sgst; 
			$SGSTAmount = $SGSTRate/100 * $amount ; // Get CGST Amount
		}
		else
			$SGSTAmount = 0;
			
		return $SGSTAmount;
	}

	function getReverseSGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount = 100)
	{
		//Get State or Union Territiry
		$STUT = State::find($ShipToStateCode)->st_ut;
		if($ShipFromStateCode == $ShipToStateCode and $STUT == "ST" and $STUT != "NA") {
			// Get SGST Percentage on product
			//$SGSTRate = getAttribute('GST Class' , 'SGST' , 'GST ID' , $GSTID);
			$SGSTRate = Gst::find($GSTID)->sgst; 
			$SGSTAmount = $amount - (($amount) / (1 + ($SGSTRate / 100))); // Get SGST Amount
		}
		else
			$SGSTAmount = 0;
			
		return $SGSTAmount;
	}

	function getIGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount = 100)
	{
		if($ShipFromStateCode != $ShipToStateCode) {
			// Get IGST Percentage on product
			//$IGSTRate = getAttribute('GST Class' , 'IGST' , 'GST ID' , $GSTID);
			$IGSTRate = Gst::find($GSTID)->igst; 
			$IGSTAmount = $IGSTRate/100 * $amount ; // Get IGST Amount
		}
		else
			$IGSTAmount = 0;
			
		return $IGSTAmount;
	}

	function getReverseIGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount = 100)
	{
		if($ShipFromStateCode != $ShipToStateCode) {
			// Get IGST Percentage on product
			//$IGSTRate = getAttribute('GST Class' , 'IGST' , 'GST ID' , $GSTID);
			$IGSTRate = Gst::find($GSTID)->igst; 
			$IGSTAmount = $amount - (($amount) / (1 + ($IGSTRate / 100))) ; // Get CGST Amount
		}
		else
			$IGSTAmount = 0;
			
		return $IGSTAmount;
	}


	function getUGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount = 100)
	{
		//Get State or Union Territiry
		//$STUT = getAttribute('State Directory' , 'ST or UT' , 'State ID' , $ShipToStateCode);
		$STUT = State::find($ShipToStateCode)->st_ut;
		if($ShipFromStateCode == $ShipToStateCode and $STUT == "UT" and $STUT != "NA") {
			 // Get UGST Percentage on product
			//$UGSTRate = getAttribute('GST Class' , 'UGST' , 'GST ID' , $GSTID);
			$UGSTRate = Gst::find($GSTID)->ugst;
			$UGSTAmount = $UGSTRate/100 * $amount ; // Get CGST Amount
		}
		else
			$UGSTAmount = 0;
			
		return $UGSTAmount;
	}

	function getReverseUGST($ShipToStateCode , $ShipFromStateCode , $GSTID , $amount = 100)
	{
		//Get State or Union Territiry
		//$STUT = getAttribute('State Directory' , 'ST or UT' , 'State ID' , $ShipToStateCode);
		$STUT = State::find($ShipToStateCode)->st_ut;
		if($ShipFromStateCode == $ShipToStateCode and $STUT == "UT" and $STUT != "NA") {
			// Get UGST Percentage on product
			//$UGSTRate = getAttribute('GST Class' , 'UGST' , 'GST ID' , $GSTID);
			$UGSTRate = Gst::find($GSTID)->ugst;
			$UGSTAmount = $amount - (($amount) / (1 + ($UGSTRate / 100))) ; // Get CGST Amount
		}
		else
			$UGSTAmount = 0;
			
		return $UGSTAmount;
	}

	function getTotalGST($GSTID , $amount = 100)
	{
		// Get CGST Percentage on product
		//$GSTRate = getAttribute('GST Class' , 'GST Percentage' , 'GST ID' , $GSTID);
		$GSTRate = Gst::find($GSTID)->rate;
		$GSTAmount = $GSTRate/100 * $amount ; // Get GST Amount
			
		return $GSTAmount;
	}

	function getTotalReverseGST($GSTID , $amount = 100)
	{
		// Get GST Percentage on product
		//$GSTRate = getAttribute('GST Class' , 'GST Percentage' , 'GST ID' , $GSTID);
		$GSTRate = Gst::find($GSTID)->rate;
		$GSTAmount = $amount - (($amount) / (1 + ($GSTRate / 100))) ; // Get GST Amount
			
		return $GSTAmount;
	}

	function getCess($CessID , $amount = 100)
	{
		//$CessRate = getAttribute('Cess Class' , 'Cess Percentage' , 'Cess ID' , $CessID);
		$CessRate = Cess::find($CessID)->rate;
		$CessAmount = $CessRate/100 * $amount ; // Get GST Amount
			
		return $CessAmount;
	}

	function getReverseCess($CessID , $amount = 100)
	{
		//$CessRate = getAttribute('Cess Class' , 'Cess Percentage' , 'Cess ID' , $CessID);
		$CessRate = Cess::find($CessID)->rate;
		$CessAmount = $amount - (($amount) / (1 + ($CessRate / 100))); // Get Cess Amount
			
		return $CessAmount;
	}
}
?>