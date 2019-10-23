<?php
// Include Your database	
include'database.php';
class DHIS2DataValueExport extends dbConnect{		
	public function getDataSetValues($username,$password,$webLink,$dataset,$period){
// Include your expected organization units and data elements                           
	include 'org-unit.php'; 
	include 'elements.php';
	foreach($org as $orgUnitName=-->$orgId){
// DHIS2 Web API setting 	
	<strong>$url =$webLink."/api/dataValueSets?dataSet=$dataset&amp;period=$period&amp;orgUnit=$orgId";</strong>
// cURL Initialization and execution 
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
	$result=curl_exec ($ch);
	curl_close ($ch);
	$data['resultData']= json_decode($result, true);			
	$i=0;
	global $element_value;
	$dataset_id=1001;
	if($i&lt;=7){	
	foreach($data as $val){
	foreach($resultDataElements as $element_idArray=>;$element_name){				
	$orgUnitServer =$data['resultData']["dataValues"][$i]["orgUnit"];				   
              $element_idServer=$data['resultData']["dataValues"][$i]["dataElement"];
				
// if($element_idArray==$element_idServer &amp;&amp; $orgId=$orgUnitServer){			
// Exported Elements value storing  		 
              $element_value =$data['resultData']["dataValues"][$i]["value"];
	if(isset($element_value) &amp;&amp; $element_value!=0){					
	$storedBy=$data['resultData']["dataValues"][$i]["storedBy"];
	$created=$data['resultData']["dataValues"][$i]["created"];					     
              $lastUpdated=$data['resultData']["dataValues"][$i]["lastUpdated"];
// Insert exported Data in Local Database
	$query="INSERT INTO dataset_values SET dataset_id='$dataset_id',period='$period',orgunit='$orgId',orgname='$orgUnitName',element_id='$element_idServer',element_value='$element_value',stored_by='$storedBy',created_date='$created',last_update='$lastUpdated'";
	$result= $this->;mysqli->;query($query) or die(mysqli_connect_errno()."Data cannot inserted.DB Installation data already existed. ");		
	if($result){
		//echo 'Data Successfully Inserted.';
		} 
	//}x
	}
	$dataset_id++; $i++;
     }
    }
}else{
	die();
     }
		}				
	}
	}
	 $username=$_POST['uname'];
	 $password=$_POST['password'];
	 $webLink=$_POST['webLink'];
	 $dataset=$_POST['dataset'];
	 $period=$_POST['period'];//$period="201507"; //07 for July// $period=$_POST['period'];
	$clsAccess=new DHIS2DataValueExport ();
	$clsAccess->;getDataSetValues($username,$password,$webLink,$dataset,$period);
?>