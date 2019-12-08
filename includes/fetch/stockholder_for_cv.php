<?php
require_once '../../config.exe';
$DB = new gavsClass;
$rec_id = $DB->secure($_POST["rec_id"]);
$qry = $DB->mysql->query("Select * From tbl_stocks Where id='$rec_id' and record_status!='Deleted' and att_status='Present'");
while($row = $qry->fetch_object()){
$name = preg_replace('(\w)', "*", strtoupper($row->lname).$row->fname);

$credits = $row->stock - $row->added_votes;


echo "<td>Name: $name</td><td id='stock_credits'>Stock: ".$credits."</td>";

}
?>