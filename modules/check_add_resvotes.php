<?php
require_once '../config.exe';
$DB = new gavsClass;
$voters_id = $_POST["voters_id"];
$res_id = $_POST["res_id"];
$amount = $_POST["amount"];
$vote = $_POST["vote"];
$qry = $DB->mysql->prepare("Insert Into tbl_res_votes(res_id, voters_id, $vote) VALUES (?,?,?)");
$qry->bind_param("iis", $res_id, $voters_id, $amount);
$qry->execute();

$qry2 = $DB->mysql->query("Update tbl_stocks Set res_added_votes=res_added_votes+'$amount' Where id='$voters_id'");
$qry3 = $DB->mysql->query("Update tbl_resolutions Set $vote=$vote+'$amount' Where id='$res_id'");

session_start();
$logs = $_SESSION["user"]." added $amount votes to the resoltion";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");
?>