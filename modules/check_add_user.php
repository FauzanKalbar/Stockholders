<?php
require_once '../config.exe';
$DB = new gavsClass;

$values = $_POST["values"];
$qry = $DB->mysql->prepare("Insert Into tbl_users (full_name,username,password,userlevel) VALUES (?,?,?,?)");
$qry->bind_param("ssss", $values[0],$values[1],md5($values[2]),$values[3]);
$qry->execute();

session_start();
$logs = $_SESSION["user"]." added new $values[3] to the users list";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");

?>