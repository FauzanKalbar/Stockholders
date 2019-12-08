<?php
require_once '../../config.exe';
$DB = new gavsClass;
//get total shares
$ts_qry = $DB->mysql->query("Select sum(share) as result From tbl_stocks Where record_status!='Deleted'");
$ts_row = $ts_qry->fetch_object();
//get actual shares
$as_qry = $DB->mysql->query("Select sum(share) as result From tbl_stocks Where att_status='Present' and record_status!='Deleted'");
$as_row = $as_qry->fetch_object(); 
//compute percentage of shares
$share_percent = $as_row->result / $ts_row->result * 100;
//get total stockholders
$sh_qry = $DB->mysql->query("Select count(*) as result From tbl_stocks Where record_status!='Deleted'");
$sh_row = $sh_qry->fetch_object(); 

//get proxy shares
$ps_qry = $DB->mysql->query("Select sum(share) as result From tbl_stocks Where proxy='Proxy' and att_status='Present' and record_status!='Deleted'");
$ps_row = $ps_qry->fetch_object(); 

//get actual attendance
$at_qry = $DB->mysql->query("Select count(*) as result From tbl_stocks Where att_status='Present' and record_status!='Deleted'");
$at_row = $at_qry->fetch_object();

//get proxy count
$px_qry = $DB->mysql->query("Select count(*) as result From tbl_stocks Where proxy='Proxy' and att_status='Present' and record_status!='Deleted'");
$px_row = $px_qry->fetch_object();

//get personal count
$pr_qry = $DB->mysql->query("Select count(*) as result From tbl_stocks Where proxy='Personal' and att_status='Present' and record_status!='Deleted'");
$pr_row = $pr_qry->fetch_object();

//as of
$ao_qry = $DB->mysql->query("Select arrival From tbl_stocks Where att_status='Present' and record_status!='Deleted' ORDER BY arrival DESC LIMIT 1");
$ao_row = $ao_qry->fetch_object();
?>
<tr><td>Total Stockholder :</td><td><?php echo $sh_row->result; ?></td></tr>
<tr><td>Total Shares :</td><td><?php echo $ts_row->result; ?></td></tr>
<tr><td>Actual Attendance :</td><td><?php echo $at_row->result; ?></td></tr>
<tr><td>Total Proxy :</td><td><?php echo $px_row->result; ?></td></tr>
<tr><td>Total Personal :</td><td><?php echo $pr_row->result;?></td></tr>
<tr><td>Actual Shares :</td><td><?php echo $as_row->result; ?></td></tr>
<tr><td>Proxy Shares :</td><td><?php echo $ps_row->result; ?></td></tr>
<tr><td>As of :</td><td><?php if($as_row->result<>NULL){ echo $ao_row->arrival; } ?></td></tr>