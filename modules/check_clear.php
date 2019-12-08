<?php
require_once '../config.exe';
$DB = new gavsClass;

$table = $_POST["table"];

if($table=="tbl_votes"){
	$qry = $DB->mysql->multi_query("Delete From tbl_votes; Delete From tbl_res_votes");
	if($qry){
		echo "Votes Table has been cleared!";	
	}else{
		echo "Error encountered while clearing Votes table";	
	}
}elseif($table=="tbl_stocks"){
	$qry = $DB->mysql->query("Update tbl_stocks Set att_status='', arrival='', proxy='', is_candidate='No', added_votes=0, casted_votes=0, res_added_votes=0, res_casted_votes=0, proxy_name=''");
	if($qry){
		echo "Stocks Table has been cleared!";	
	}else{
		echo "Error encountered while clearing Votes table";	
	}
}
?>