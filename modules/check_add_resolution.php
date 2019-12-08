<?php
require_once '../config.exe';
$DB = new gavsClass;

$values = $_POST["values"];
$qry = $DB->mysql->prepare("Insert Into tbl_resolutions (id,res_name,description) VALUES (?,?,?)");
$qry->bind_param("iss", $values[0],$values[1],$values[2]);
$qry->execute();

session_start();
$logs = $_SESSION["user"]." added ".$values[1]. " to the resolutions";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");

?>