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
	<thead><th>RANK</th><th>CANDIDATE</th><th>TOTAL VOTES</th></thead>
    <?php
	$qry = $DB->mysql->query("Select tbl_stocks.lname, tbl_stocks.fname, sum(tbl_votes.amount) as result From tbl_votes, tbl_stocks Where tbl_votes.candidate_id=tbl_stocks.id and tbl_votes.is_temp='No' GROUP BY tbl_votes.candidate_id ORDER BY sum(tbl_votes.amount) DESC LIMIT 10");
	$a = 0;
	while($row = $qry->fetch_object()){
		$a = $a + 1;
		echo "<tr><td align='center'><b>".$a."</b></td><td>".strtoupper($row->lname).", ".$row->fname."</td><td align='right'>".$row->result."</td></tr>";
	}
	
	$qry2 = $DB->mysql->query("SELECT sum(amount) as amt, count(id) as ctr  FROM `tbl_votes`");
	$row2 = $qry2->fetch_objecT();
	?>
    
    <tr><td colspan="2" align="right"><b>Total Number of Votes</b></td><td align="right"><?php echo $row2->amt; ?></td></tr>
    <tr><td colspan="2" align="right"><b>Total Number of Ballots</b></td><td align="right"><?php echo $row2->ctr; ?></td></tr>
</table>

<div id="basta">
	<p>Prepared by: Election and Canvassing Committee</p>
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
