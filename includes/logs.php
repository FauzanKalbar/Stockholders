<section id="section-1">
    	<article class="article-1">
        	<header>System Logs</header>
            	<table width="100%" cellspacing="0" cellspacing="0" class="record-table">
	<thead><th>ID</th><th>Logs</th><th>Date/Time</th></thead>
            <?php
				require_once 'config.exe';
				$DB = new gavsClass;
				$qry = $DB->mysql->query("Select * From tbl_logs");
				while($row = $qry->fetch_object()){
					echo "<tr id=".$row->id.">
							  <td>".$row->id."</td>
							  <td>".$row->logs."</td>
							  <td>".$row->date_time."</td>
							  
						  </tr>";	
				}
				
						
			?>
            		
                       
                   <tr><td colspan="5" align="center"> -------- Nothing Follows --------</td></tr>
            </table>         
            <footer></footer>
        </article>
    </section>