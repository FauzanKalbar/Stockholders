<?php
require_once '../config.exe';
$DB = new gavsClass;




$qry = $DB->mysql->query("Update tbl_res_votes Set is_temp='NO' Where is_temp='YES'");

$qry3 = $DB->mysql->query("Update tbl_resolutions Set vote_yes=0, vote_no=0, vote_abstain=0");

session_start();
$logs = $_SESSION["user"]." casted resolution votes";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");
?>