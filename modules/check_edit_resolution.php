<?php
require_once '../config.exe';
$DB = new gavsClass;
$values = $_POST["values"];
$rec_id = $_POST["rec_id"];

$qry = $DB->mysql->prepare("Update tbl_resolutions Set id=?, res_name=?, description=? Where id=?");
$qry->bind_param("issi", $values[0],$values[1],$values[2],$rec_id);
$qry->execute();


session_start();
$logs = $_SESSION["user"]." updated $values[1] From resolutions";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");
?>