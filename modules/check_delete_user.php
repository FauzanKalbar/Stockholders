<?php
require_once '../config.exe';
$DB = new gavsClass;

$rec_id = $_POST["rec_id"];
$qry = $DB->mysql->prepare("Update tbl_users Set record_status='Deleted' Where id=?");
$qry->bind_param("i", $rec_id);
$qry->execute();

session_start();
$logs = $_SESSION["user"]." deleted user # $rec_id From the users list.";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");
?>