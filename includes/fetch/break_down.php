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

//compute percentage of proxy shahre
$ps_percent = $ps_row->result / $ts_row->result * 100;

//compute personal share
$pr_qry = $DB->mysql->query("Select sum(share) as result From tbl_stocks Where proxy='Personal' and att_status='Present' and record_status!='Deleted'");
$pr_row = $pr_qry->fetch_object(); 
//compute personal share percent
$pr_percent = $pr_row->result / $ts_row->result * 100;

//as of

$ao_qry = $DB->mysql->query("Select arrival From tbl_stocks Where att_status='Present' and record_status!='Deleted' ORDER BY arrival DESC LIMIT 1");
$ao_row = $ao_qry->fetch_object();
?>			
                    
                    
      <div id="tts"></div>
      <p>Total Stock Shares <?php echo $as_row->result; ?> or <span id="tts_val"><?php echo $share_percent; ?>%</span><br>
      as of <?php if($as_row->result<>NULL){ echo $ao_row->arrival; }?>
      </p>
      
      <div id="tps"></div>
      <p>Total Personal Shares <?php echo $pr_row->result; ?> or <span id="tps_val"><?php echo $pr_percent; ?>%</span></p>
      
      <div id="tsp"></div>
      <p>Total Shares with Proxies <?php echo $ps_row->result; ?> or <span id="tsp_val"><?php echo $ps_percent; ?>%</span></p>
      
<script language="javascript">
				$("#tts").progressbar({value: <?php echo $share_percent; ?>, min: 0});
				$("#tps").progressbar({value: <?php echo $pr_percent; ?>, min: 0});
				$("#tsp").progressbar({value: <?php echo $ps_percent; ?>, min: 0});
</script>