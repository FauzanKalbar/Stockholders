<?php
require_once '../config.exe';
$DB = new gavsClass;
$values = $_POST["values"];
$rec_id = $_POST["rec_id"];

$qry = $DB->mysql->prepare("Update tbl_stocks Set lname=?, fname=?, stock=?, share=? Where id=?");
$qry->bind_param("ssiii", $values[0],$values[1],$values[2],$values[3],$rec_id);
$qry->execute();


session_start();
$logs = $_SESSION["user"]." Updated stockholder # $rec_id , $values[1] From the Stockholders";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");
?>