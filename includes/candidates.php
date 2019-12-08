<script language="javascript">
$(document).ready(function(e) {
    $("#feed_back").load("includes/stockholders_data.php");
	$("#add_record").hide();
	
	
	$("#btn_add_record").click(function(){
		$("#add_record").show();	
	});
	
	$("#btn_cancel").click(function(){
		$("#add_record").hide();	
	});
	
	$("#btn_save").click(function(){
		if($(".input").val()!=""){
		values = [];
		
		$(".input").each(function(index, element) {
            values.push($(this).val());
        });
		
		$.post("modules/check_add_candidate.php",{values: values},function(data){
			if(data==""){
				window.location="index.php?page=candidates";
			}else{
				
			}
		});
		}else{
			alert("Please Select Candidate!");	
		}
	});
	
	$(".btn_delete").click(function(data){
		
		var quest = confirm("Are you sure you want to remove the candidate?");
		if (quest==true){
			$.post("modules/check_delete_candidate.php",{rec_id: $(this).attr("rec_id")},function(data){
				if(data==""){
					window.location="index.php?page=candidates";
				}
			});	
		}
	});
	
	
	$(".btn_edit").click(function(){
	rec_id = $(this).attr("rec_id");
	
	function crap(){
		$("#"+rec_id+" td:not('.option')").each(function(index, element) {
            $(this).html("<input class='input' value="+$(this).text()+">");
        });
	}

	function mofo(){
		$("#"+rec_id+" td input").each(function(index, element) {
            $(this).parent("td").text($(this).val());
        });
		$("#"+rec_id+" .option .btn_edit, #"+rec_id+" .option .btn_delete").show();
		$("#"+rec_id+" .option .save_edit").hide();
	}
	
	crap();
		
	$("#"+rec_id+" .option .btn_edit, #"+rec_id+" .option .btn_delete").hide();
	$("#"+rec_id+" .option .save_edit").show();
	
		$(".save_edit").click(function(){
			rec_id2 = $(this).attr("rec_id");
			values = [];
			$("#"+rec_id2+" .input").each(function(index, element) {
                values.push($(this).val());
            });
			$.post("modules/check_edit_stockholder.php",{rec_id: rec_id2, values: values},function(data){
				if(data==""){
					mofo();
				}
			});

		});
	});
	
	
	
});
</script>	

    
    
    <section id="section-1">
    	<article class="article-1">
        	<header>Candidates<div id="tool-box"><img src="images/icons/8f1833da.png" height="25px" width="25px" id="btn_add_record"></div></header>
            	<table width="50%" cellspacing="0" cellspacing="0" class="record-table">
	<thead><th>ID</th><th>Last Name</th><th>First Name</th><th>Options</th></thead>
            <?php
				require_once 'config.exe';
				$DB = new gavsClass;
				$qry = $DB->mysql->query("Select * From tbl_stocks Where is_candidate='Yes' and  record_status!='Deleted'");
				while($row = $qry->fetch_object()){
					echo "<tr id=".$row->id.">
							  <td>".$row->id."</td>
							  <td>".$row->lname."</td>
							  <td>".$row->fname."</td>
							  <td width='30px' class='option'>
							  				   <img src='images/icons/1406610264_DeleteRed.png' rec_id=".$row->id." class='btn_delete'>
											   
						  </tr>";	
				}
				
						
			?>
            		<tr id="add_record">
                    	<td colspan="4">
                        	Select Candidate: <select class="input">
                            						<option value="">Select Candidate</option>
                                                    <?php
													$qry_sh = $DB->mysql->query("Select * From tbl_stocks Where record_status!='Deleted' and is_candidate!='Yes'");
													
													while($row_sh = $qry_sh->fetch_object()){
													
														echo "<option value='". $row_sh->id ."'>".strtoupper($row_sh->lname)." ".$row_sh->fname."</option>";		
													}
													?>
                            				  </select>
                        </td>
                        <td width="30px"><img src="images/icons/1406702924_clean.png" id="btn_save"><img src="images/icons/Button-Cancel-icon.png" id="btn_cancel"></td>
                        </tr>
                       
                   <tr><td colspan="6" align="center"> -------- Nothing Follows --------</td></tr>
            </table>         
            <footer></footer>
        </article>
    </section>