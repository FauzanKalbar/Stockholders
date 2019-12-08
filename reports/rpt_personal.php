
<div id="header">
<p align="center" id="nc">Northeastern College</p>
<p align="center">Stockholders Meeting</p>
<p align="center"><font size="2">August 31, 2014</p></font><br><br>

<p align="center"><b>Electronic Canvassing Report</b></p>
</div>
<?php
require_once '../config.exe';
$DB = new rodelClass;


?>
<table width="100%" cellspacing="0" cellspacing="0" class="record-table">
             <thead><th colspan="6"><Font Size="12">LIST OF PERSONAL</font></th></thead>
	<thead><th>Last Name</th><th>First Name</th><th>Status</th><th>Arrival</th><th>Proxy</th><th>Options</th></thead>
            <?php
				require_once 'config.exe';
				
				$DB = new rodelClass;
				
				
				$qry = $DB->mysql->query("Select * From tbl_stocks Where att_status='Present' and proxy='Personal' and record_status!='Deleted'");
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
            
           <br><br>
           
           <table width="100%" cellspacing="0" cellspacing="0" class="record-table">
             <thead><th colspan="6"><Font Size="12">LIST OF PERSONAL</font></th></thead>
	<thead><th>Last Name</th><th>First Name</th><th>Status</th><th>Arrival</th><th>Proxy</th><th>Options</th></thead>
            <?php
				require_once 'config.exe';
				
				$DB = new rodelClass;
				
				
				$qry = $DB->mysql->query("Select * From tbl_stocks Where att_status='Present' and proxy='Proxy' and record_status!='Deleted'");
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


<br><br>


<table width="100%" cellspacing="0" cellspacing="0" class="record-table">
             <thead><th colspan="6"><Font Size="12">LIST OF PERSONAL</font></th></thead>
	<thead><th>Last Name</th><th>First Name</th><th>Status</th><th>Arrival</th><th>Proxy</th><th>Options</th></thead>
            <?php
				require_once 'config.exe';
				
				$DB = new rodelClass;
				
				
				$qry = $DB->mysql->query("Select * From tbl_stocks Where att_status='-' and proxy='Personal' and record_status!='Deleted'");
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

