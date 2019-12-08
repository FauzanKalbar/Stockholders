<script language="javascript">
		$(document).ready(function(e) {
            $(".input").keyup(function(){
		
				var rec_id = $(this).val();
				
				$.post("includes/fetch/stockholder_for_cv.php",{rec_id: rec_id},function(data){

					$("#stockholder-fb").html(data);	
				});
					
		});
		
		$("#add_btn").click(function(){
			var creds = 0;
			var amt = 0;
			var cred = $("#stock_credits").text();
			creds = cred.replace("Stock: ", "") - 0;
			amt = $("#amt").val();
			if(amt <= creds){
			
			if($("#stockholder-fb").text()!="" && $(".cands").val()!=""){
				 if($("#amt").val()==""){
					alert("Please provide amount.");
				}else{
					var voters_id = $("#sh_id").val();
					var cand_id = $(".cands").val();
					var amount = $("#amt").val();
					$.post("modules/check_add_votes.php",{voters_id: voters_id, cand_id: cand_id, amount: amount},function(data){
						if(data==""){
							$("#fb").load("includes/fetch/get_votes.php");	
							
							var rec_id = $(".input").val();
				
							$.post("includes/fetch/stockholder_for_cv.php",{rec_id: rec_id},function(data){
			
								$("#stockholder-fb").html(data);
						
							});
							
						}
					});
				}
			}else{
				alert("Either Candidate or Stockholder is empty!");	
			}
			}else{
				alert("Not enough stocks to add the vote!");	
			}
		});
		
		
		$("#cast_btn").click(function(){
			$.post("modules/check_cast_votes.php",{},function(data){
						if(data==""){
							alert("Votes had been Cast!");
							window.location="index.php?page=cast_votes";	
						}
			});	
		});
		
        });
        

</script>
<style type="text/css">
	#stockholder-fb, .cands, #amt, .record-table{
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
    <header>Cast Votes</header>
    	<article class="article-1">
        		<table>
                	<tr><td><div class="placeHolder"><input type="text" class="input" watermark="Balot #" size="50" id="sh_id"><img src="images/icons/Search-icon.png"></div></td></tr>
                    <tr id="stockholder-fb"></tr>
                </table>
  				
          		<table>
                	<tr>
                    	<td><select class="cands">
                        		<option value="">Select Candidate</option>
                                <?php
								require_once 'config.exe';
								$DB = new gavsClass;
								$qry = $DB->mysql->query("Select * From tbl_stocks Where is_candidate='Yes' and record_status!='Deleted'");
								while($row = $qry->fetch_object()){
									
									echo "<option value=".$row->id.">".strtoupper($row->lname).", ".$row->fname."</option>";	
								}
							
								?>
                        	</select></td>
                    
                    <td><div class="placeHolder"><input type="text" id="amt" size="10" watermark="Amount"></div></td><td><button class="green_button" id="add_btn">Add</button></td></tr>
                </table>
                
                <p id="fb">
                	
                </p>
                
                
            <footer></footer>
        </article>
    </section>
    
  