<?php
require_once '../config.exe';
$DB = new gavsClass;
$values = $_POST["values"];
$qry = $DB->mysql->prepare("Update tbl_stocks Set is_candidate='Yes' Where id=?");
$qry->bind_param("i", $values[0]);
$qry->execute();
session_start();
$logs = $_SESSION["user"]." added stockholder #". $values[0] . " to the candidates.";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");

?>