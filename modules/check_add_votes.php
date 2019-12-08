<?php
require_once '../config.exe';
$DB = new gavsClass;
$voters_id = $_POST["voters_id"];
$cand_id = $_POST["cand_id"];
$amount = $_POST["amount"];
$qry = $DB->mysql->prepare("Insert Into tbl_votes(candidate_id, voters_id, amount) VALUES (?,?,?)");
$qry->bind_param("iis", $cand_id, $voters_id, $amount);
$qry->execute();

$qry2 = $DB->mysql->query("Update tbl_stocks Set added_votes=added_votes+'$amount' Where id='$voters_id'");


session_start();
$logs = $_SESSION["user"]." added $amount votes from votes # $voters_id for canidate # $cand_id";
$qry_logs = $DB->mysql->query("Insert Into tbl_logs (logs,date_time) VALUES ('$logs',NOW())");
?>