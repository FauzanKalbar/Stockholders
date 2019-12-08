<?php
require_once '../config.exe';
$DB = new gavsClass;

$qry = $DB->mysql->query("Update tbl_votes Set is_temp='No' Where is_temp='Yes'");

session_start();
$logs = $_SESSION["user"]." casted votes";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");
?>