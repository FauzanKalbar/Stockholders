
<div id="header">
<p align="center" id="nc">Northeastern College</p>
<p align="center">Stockholders Meeting</p>
<p align="center"><font size="2">August 31, 2014</p></font><br><br>

<p align="center"><b>Electronic Canvassing Report</b></p>
</div>
<?php
require_once '../config.exe';
$DB = new rodelClass;

$qry = $DB->mysql->query("Select tbl_stocks.id as cand_id, tbl_stocks.lname, tbl_stocks.fname, sum(tbl_votes.amount) as result From tbl_votes, tbl_stocks Where tbl_votes.candidate_id=tbl_stocks.id and tbl_votes.is_temp='No' GROUP BY tbl_votes.candidate_id ORDER BY sum(tbl_votes.amount) DESC LIMIT 10");

	while($row = $qry->fetch_object()){
?>
<table width="100%" cellspacing="0" cellspacing="0" class="record-table">
             <thead><th colspan="6"><Font Size="12">LIST OF PERSONAL</font></th></thead>
	<thead><th>Last Name</th><th>First Name</th><th>Status</th><th>Arrival</th><th>Proxy</th><th>Options</th></thead>
            <?php
				require_once 'config.exe';
				
				$DB = new rodelClass;
				
				
				$qry = $DB->mysql->query("Select * From tbl_stocks Where att_status='Present' and record_status!='Deleted'");
				while($row = $qry->fetch_object()){
					$att_status='Present';
					if($row->att_status!='Present'){
						$att_status = "<img src='images/icons/App-personal-icon.png' rec_id=".$row->id." class='btn_personal'>&nbsp;&nbsp;
							  				   <img src='images/icons/proxy-icon.png' rec_id=".$row->id." class='btn_proxy'>";
					}
					echo "<tr id=".$row->id.">
							   
							  <td>".$row->lname."</td>
							  <td>".$row->fname."</td>
							  <td>".$row->att_status."-".$row->proxy."</td>
							  <td>".$row->arrival."</td>
							  <td>".$row->proxy_name."</td>
							  <td width='30px' class='option'>$att_status
											   </td>
						  </tr>";	
				}
				
						
			?>
            		
                       
                   <tr><td colspan="6" align="center"> -------- Nothing Follows --------</td></tr>
            </table>         
            

    <?php
	
		//echo "<tr><td align='center'><b>".$a."</b></td><td>".strtoupper($row->lname).", ".$row->fname."</td><td align='right'>".$row->result."</td></tr>";
	}
	
	
	?>

