<?php
require_once '../config.exe';
$DB = new gavsClass;
$values = $_POST["values"];
$rec_id = $_POST["rec_id"];

if($values[2]=="••••••••••••••"){
	$password="";	
}else{
	$password=",password='".md5($values[2])."'";
}

$qry = $DB->mysql->prepare("Update tbl_users Set full_name=?, username=?, userlevel=? $password Where id=?");
$qry->bind_param("sssi", $values[0],$values[1],$values[3],$rec_id);
$qry->execute();


session_start();
$logs = $_SESSION["user"]." Updated user # $rec_id From the users list";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");
?>