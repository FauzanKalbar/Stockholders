<script language="javascript">
		$(document).ready(function(e) {
            $(".input").keyup(function(){
		
				var rec_id = $(this).val();
				
				$.post("includes/fetch/stockholder_for_rescv.php",{rec_id: rec_id},function(data){

					$("#stockholder-fb").html(data);	
				});
					
		});
		
		$("#add_btn").click(function(){
			var creds = 0;
			var amt = 0;
			var cred = $("#stock_credits").text();
			creds = cred.replace("Share: ", "") - 0;
			amt = $("#amt").val();
			if(amt <= creds){
			
			if($("#stockholder-fb").text()!="" && $(".cands").val()!="" && $(".vt").val()!=""){
				 if($("#amt").val()==""){
					alert("Please provide amount.");
				}else{
					var voters_id = $("#sh_id").val();
					var cand_id = $(".cands").val();
					var amount = $("#amt").val();
					var vote = $(".vt").val();
					$.post("modules/check_add_resvotes.php",{voters_id: voters_id, res_id: cand_id, amount: amount, vote: vote},function(data){
						if(data==""){
							window.location="index.php?page=cast_res_votes";	
						}
					});
				}
			}else{
				alert("Either Resolution or Stockholder is empty!");	
			}
			}else{
				alert("Not enough stocks to add the vote!");	
			}
		});
		
		
		$("#cast_btn").click(function(){
			$.post("modules/check_cast_resvotes.php",{},function(data){
						if(data==""){
							alert("Votes had been Cast!");
							window.location="index.php?page=cast_res_votes";	
						}
			});	
		});
		
        });
        

</script>
<style type="text/css">
	#stockholder-fb, .cands, #amt, .record-table, .vt{
		font-size:20px;
		font-weight:bold;	
	}
	#amt{
		height:25px;	
	}
	#add_btn,#cast_btn{
		height:40px;
		width:100px;	
	}
	#cast_btn{
		background:rgba(126,124,255,1.00);	
	
	}

</style>
<section id="section-1">
    <header>Cast Resolution Votes</header>
    	<article class="article-1">
        		<table>
                	<tr><td><div class="placeHolder"><input type="text" class="input" watermark="Search" size="50" id="sh_id"><img src="images/icons/Search-icon.png"></div></td></tr>
                    <tr id="stockholder-fb"></tr>
                </table>
  				
          		<table>
                	<tr>
                    	<td><select class="cands">
                        		<option value="">Select Resolution</option>
                                <?php
								require_once 'config.exe';
								$DB = new gavsClass;
								$qry = $DB->mysql->query("Select * From tbl_resolutions Where record_status!='Deleted'");
								while($row = $qry->fetch_object()){
									
									echo "<option value=".$row->id.">".strtoupper($row->res_name)."</option>";	
								}
								?>
                        	</select></td>
                            <td>
                            <select class="vt">
                            	<option value="">Vote</option>
                                <option value="vote_yes">Yes</option>
                                <option value="vote_no">No</option>
                                <option value="vote_abstain">Abstain</option>
                            </select>
                    		</td>
                    <td><div class="placeHolder"><input type="text" id="amt" size="10" watermark="Amount"></div></td><td><button class="green_button" id="add_btn">Add</button></td></tr>
                </table>
                
                <table class="record-table" width="50%">
                	<thead><th>Resolution</th><th>Yes</th><th>No</th><th>Abstain</th></thead>
                    <?php
					$qry2 = $DB->mysql->query("Select tbl_resolutions.res_name, sum(tbl_res_votes.vote_yes) as yes, sum(tbl_res_votes.vote_no) as no, sum(tbl_res_votes.vote_abstain) as abstain From tbl_resolutions, tbl_res_votes Where tbl_res_votes.is_temp='YES' and tbl_res_votes.res_id=tbl_resolutions.id GROUP BY tbl_res_votes.res_id");
					while($row2 = $qry2->fetch_object()){
						echo "<tr><td>".strtoupper($row2->res_name)."</td><td>".$row2->yes."</td><td>".$row2->no."</td>
								  <td>".$row2->abstain."</td>	
							</tr>";
					}
					
					?>
                    <tr><td colspan="4" align="center"> -------- Nothing Follows --------</td></tr>
                    <tr><td colspan="4" align="right"><button class="blue_button" id="cast_btn">Cast Votes</button></td></tr>
                </table>
                
                
            <footer></footer>
        </article>
    </section>
    
  