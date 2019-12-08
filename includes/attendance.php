    <script language="javascript">
    $(document).ready(function(e) {
        $(".input").keyup(function(){
		
				var rec_id = $(this).val();
				
				$.post("includes/get_stockholder_for_attendance.php",{rec_id: rec_id},function(data){
					$("#feed-back").html(data);	
				});
				$.post("includes/fetch/get_tss.php",{},function(data){
					
				});
				
		});
		
		$(this).get_res();
		
		$("#feed-back").click(function(){
			
			//$(this).get_res();
		});
		
			
    });

    </script>
    
    
    <section id="section-1">
    <header>Credential/Attendance</header>
    	<article class="article-1">
        		
  				<table>
                	<tr><td><div class="placeHolder"><input type="text" class="input" watermark="Search" size="50"><img src="images/icons/Search-icon.png"></div></td></tr>
                </table>
                
                <p id="feed-back">
                		 		 
                </p>
                <div id="break_down" style="width:50%; margin:0px auto; float:left; margin-left:20px; font-size:20px; font-weight:bold;">
                	
                </div>
              
                <div id="att_monitor" style="width:40%; margin:0px auto; float:left; margin-left:20px; font-size:20px; font-weight:bold;">
                	<table id="fb-monitor">
                    	
                    </table>
                </div>
                
             
             <table width="100%" cellspacing="0" cellspacing="0" class="record-table">
             <thead><th colspan="6">LIST OF PRESENT</th></thead>
	<thead><th>Last Name</th><th>First Name</th><th>Status</th><th>Arrival</th><th>Proxy</th><th>Options</th></thead>
            <?php
				require_once 'config.exe';
				
				$DB = new gavsClass;
				
				
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
            
                
                
                
            <footer></footer>
        </article>
    </section>