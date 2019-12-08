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
		margin:50px auto;
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

$qry = $DB->mysql->query("Select tbl_stocks.id as cand_id, tbl_stocks.lname, tbl_stocks.fname, sum(tbl_votes.amount) as result From tbl_votes, tbl_stocks Where tbl_votes.candidate_id=tbl_stocks.id and tbl_votes.is_temp='No' GROUP BY tbl_votes.candidate_id ORDER BY sum(tbl_votes.amount) DESC LIMIT 10");

	while($row = $qry->fetch_object()){
?>
<table align="center" width="70%" id="res">
	<thead><th colspan="2">Canidate: <?php echo strtoupper($row->lname)." ".$row->fname; ?></th></thead>
	<thead><th>Stockholder #</th><th>Amount of Votes</th></thead>
	<?php
	$get_votes = $DB->mysql->query("Select * From tbl_votes Where candidate_id='".$row->cand_id."' and is_temp='No'");
	while($gv = $get_votes->fetch_object()){
		echo "<tr><td>$gv->voters_id</td><td align='right'>$gv->amount</td></tr>";
	}
	
	$qry2 = $DB->mysql->query("SELECT sum(amount) as amt, count(id) as ctr  FROM `tbl_votes` Where candidate_id='".$row->cand_id."' and is_temp='No'");
	$row2 = $qry2->fetch_objecT();
	?>
    
    <tr><td align="right"><b>Total Number of Votes</b></td><td align="right"><strong><?php echo $row2->amt; ?></strong></td></tr>
    <tr><td align="right"><b>Total Number of Ballots</b></td><td align="right"><strong><?php echo $row2->ctr; ?></strong></td></tr>
    <tr><td align="center" colspan="2">----------------- Nothing Follows -----------------</td></tr>
</table>

    <?php
	
		//echo "<tr><td align='center'><b>".$a."</b></td><td>".strtoupper($row->lname).", ".$row->fname."</td><td align='right'>".$row->result."</td></tr>";
	}
	
	
	?>

