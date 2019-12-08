
                
                <table class="record-table" width="50%">
                	<thead><th>Candidate</th><th>Votes</th></thead>
                    <?php
					require_once '../../config.exe';
					$DB = new gavsClass;
					$qry2 = $DB->mysql->query("Select tbl_votes.candidate_id as cand_id, sum(tbl_votes.amount) as amt, CONCAT(tbl_stocks.lname, ', ', tbl_stocks.fname) as full_name From tbl_votes, tbl_stocks Where is_temp='YES' and tbl_votes.candidate_id=tbl_stocks.id GROUP BY tbl_votes.candidate_id");
					while($row2 = $qry2->fetch_object()){
						echo "<tr><td>".strtoupper($row2->full_name)."</td><td>".$row2->amt."</td></tr>";
					}
					
					?>
                    <tr><td colspan="2" align="center"> -------- Nothing Follows --------</td></tr>
                    <tr><td colspan="2" align="right"><button class="blue_button" id="cast_btn">Cast Votes</button></td></tr>
                </table>