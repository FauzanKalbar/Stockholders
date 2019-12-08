<?php
require_once '../config.exe';
$DB = new gavsClass;

$rec_id = $_POST["rec_id"];
$qry = $DB->mysql->prepare("Update tbl_stocks Set is_candidate='No' Where id=?");
$qry->bind_param("i", $rec_id);
$qry->execute();


session_start();
$logs = $_SESSION["user"]." deleted # $rec_id from candidates list";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");

?>