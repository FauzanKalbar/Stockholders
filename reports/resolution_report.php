<style type="text/css">
	body{
		font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
		line-height:0;	
	}
	p{
		
	}
	#nc{
		font-size:24px;
		font-weight:bold;	
	}
	#header{
		margin-top:10px;	
	}
	table{
		
	}
	table th{
		background:rgba(216,216,216,1.00);
		border-bottom:thin solid #000000;	
	}
	#res td{
		border:thin solid #000;	
	}
	#basta{
		margin:20px auto;
		width:70%;
		font-size:12px;
	}
	#signatories{
		line-height:70px;
	}
	#basta table{
		text-align:center;
		margin-top:20px;	
	}
	#basta table tr:nth-child(odd) td{
		padding-top:30px;
	}
</style>
<div id="header">
<p align="center" id="nc">Northeastern College</p>
<p align="center">Stockholders Meeting</p>
<p align="center"><font size="2">August 31, 2014</p></font><br><br>

<p align="center"><b>Electronic Canvassing Report</b></p>
</div>
<?php
require_once '../config.exe';
$DB = new gavsClass;
?>
<table align="center" width="80%" id="res">
	<thead><th>RESOLUTION #</th><th>IN FAVOR</th><th>NOT IN FAVOR</th><th>ABSTAIN</th></thead>
    <?php
	$qry = $DB->mysql->query("Select tbl_res_votes.res_id, tbl_resolutions.res_name, sum(tbl_res_votes.vote_yes) as infavor, sum(tbl_res_votes.vote_no) as nif, sum(tbl_res_votes.vote_abstain) as abstain From tbl_res_votes, tbl_resolutions Where tbl_res_votes.res_id=tbl_resolutions.id GROUP By tbl_res_votes.res_id ORDER BY tbl_res_votes.id ASC");

	while($row = $qry->fetch_object()){
		
		echo "<tr><td align='center'><b>".$row->res_id."</b>
				  </td><td align='right'>".$row->infavor."</td>
				  <td align='right'>".$row->nif."</td>
				  <td align='right'>".$row->abstain."</td></tr>";
	}
	
	$qry2 = $DB->mysql->query("SELECT sum(vote_yes) as vy, sum(vote_no) as vn, sum(vote_abstain) as abs, count(id) as ctr  FROM `tbl_res_votes`");
	$row2 = $qry2->fetch_object();
	$total_votes = $row2->vy + $row2->vn + $row2->abs;
	?>
    
    <tr><td colspan="3" align="right"><b>Total Number of Votes</b></td><td align="right"><?php echo $total_votes; ?></td></tr>
    <tr><td colspan="3" align="right"><b>Total Number of Ballots</b></td><td align="right"><?php echo $row2->ctr; ?></td></tr>
</table>

<div id="basta">
	<p>Prepared by: (Computer Committee)</p>
    <table width="100%">
    	<tr id=""><td>________________________</td><td>________________________</td></tr>
    	<tr id=""><td>Abraham Guingab</td><td>Engr. Loida Hermosura</td></tr>
        <tr id=""><td>________________________</td><td>________________________</td></tr>
        <tr id=""><td>Noriel Cailloan</td><td>Sherwin Semanero</td></tr>
        <tr id=""><td>________________________</td><td>________________________</td></tr>
        <tr id=""><td>Floradel Adoma</td><td>Anthony Manuel</td></tr>
        <tr id=""><td colspan="2" align="center">________________________</td></tr>
        <tr id=""><td colspan="2" align="center">Fidelito Bautista</td></tr>
    </table>
</div>
