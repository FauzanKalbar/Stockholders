		<script language="javascript">
        	$(".btn_personal").click(function(){
				
				var rec_id = $(this).attr("rec_id");
				$.post("modules/check_save_attendance.php",{rec_id: rec_id, presence: "Personal", proxy_name: ""},function(data){

					if(data==""){
					var rec_id = $(".input").val();
					$.post("includes/get_stockholder_for_attendance.php",{rec_id: rec_id},function(data){
						$("#feed-back").html(data);	
						$(this).get_res();
					});
					}
				});	
				
			});
			
			
			$(".btn_proxy").click(function(){
				
				var proxy_name = prompt("Please Enter Proxy Name.");

				if(proxy_name){
				
				var rec_id = $(this).attr("rec_id");
				$.post("modules/check_save_attendance.php",{rec_id: rec_id, presence: "Proxy", proxy_name: proxy_name},function(data){
					if(data==""){
					var rec_id = $(".input").val();
					$.post("includes/get_stockholder_for_attendance.php",{rec_id: rec_id},function(data){
						$("#feed-back").html(data);
						$(this).get_res();	
					});
					}
				});
				}else{
					alert("Invalid Proxy Name, Try Again.");	
				}
					
			});
			
			
        </script>
        <?php if($_POST["rec_id"]){ ?>
        <table width="100%" cellspacing="0" cellspacing="0" class="record-table">
        
	<thead><th>Last Name</th><th>First Name</th><th>Status</th><th>Arrival</th><th>Proxy</th><th>Options</th></thead>
            <?php
				require_once '../config.exe';
				
				$DB = new gavsClass;
				$rec_id = $DB->secure($_POST["rec_id"]);
				
				$qry = $DB->mysql->query("Select * From tbl_stocks Where (id='$rec_id' or fname LIKE '%$rec_id%'or lname LIKE '%$rec_id%') and record_status!='Deleted'");
				while($row = $qry->fetch_object()){
					$att_status='Present';
					if($row->att_status!='Present'){
						$att_status = "<img src='images/icons/App-personal-icon.png' rec_id=".$row->id." class='btn_personal' title='Personal'>&nbsp;&nbsp;
							  				   <img src='images/icons/proxy-icon.png' rec_id=".$row->id." class='btn_proxy' title='Proxy'>";
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
            <?php } ?>