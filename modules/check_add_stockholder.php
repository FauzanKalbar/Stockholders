<?php
require_once '../config.exe';
$DB = new gavsClass;

$values = $_POST["values"];
$qry = $DB->mysql->prepare("Insert Into tbl_stocks (lname,fname,stock,share) VALUES (?,?,?,?)");
$qry->bind_param("ssii", $values[0],$values[1],$values[2],$values[3]);
$qry->execute();

session_start();
$logs = $_SESSION["user"]." added $values[1] $values[0] to the stockholders list";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");

?>