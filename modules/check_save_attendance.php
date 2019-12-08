<?php
require_once '../config.exe';
$DB = new gavsClass;
date_default_timezone_set("Asia/Manila");
$arrival = date("Y-m-d H:i:s");
$rec_id = $_POST["rec_id"];
$presence = $_POST["presence"];
$proxy_name = $_POST["proxy_name"];
$present = "Present";
$qry = $DB->mysql->prepare("Update tbl_stocks Set att_status=?, arrival=?, proxy=?, proxy_name=? Where id=?");
$qry->bind_param("ssssi", $present, $arrival, $presence, $proxy_name, $rec_id);
$qry->execute();


session_start();
$logs = $_SESSION["user"]." Updated the attendance for stockholder # $rec_id";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");
?>