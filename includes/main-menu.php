	<?php
	if($_SESSION["userlevel"]=="Administrator"){
	?>
    
    <nav id="side-nav">
        	<ul>
            	<li class="parent-nav"><a href="index.php?page=attendance">Credential/Attendance</a></li>
				<li class="parent-nav"><a href="#">Canvassing</a>
                	<ul class="child-nav">
                    	<li><a href="index.php?page=cast_votes">Cast Votes</a></li>
                        <li><a href="index.php?page=cast_res_votes">Cast Resolution Votes</a></li>
                    </ul>
                    
                </li>
				
                <li class="parent-nav"><a href="#">Administrator</a>
                	<ul class="child-nav">
                    	<li><a href="index.php?page=stockholders">Stockholders</a></li>
                        <li><a href="index.php?page=candidates">Candidates</a></li>
                        <li><a href="index.php?page=resolutions">Resolutions</a></li>
                        <li><a href="index.php?page=users">Users</a></li>
                    </ul>
                </li>
    				
                <li class="parent-nav"><a href="#">Reports</a>
                	<ul class="child-nav">
                    	<li><a href="#" id="cv">Canvas Report</a></li>
                        <li><a href="#" id="crv">Resolutions Report</a></li>
                        <li><a href="#" id="stmt">Statement of Votes</a></li>
                    </ul>
                </li>
                
                <li class="parent-nav"><a href="#">System</a>
                	<ul class="child-nav">
                    	<li><a href="index.php?page=logs">System Logs</a></li>
                        <li><a href="index.php?page=clear">Clear Tables</a></li>
                    </ul>
                </li>
                
                <li class="parent-nav"><a href="#"  id="logout_me">Logout</a>
 
                </li>
                
                
            </ul>
        </nav>
        
        <?php 
		}elseif($_SESSION["userlevel"]=="Verificator"){
			
		
		?>
		
        <nav id="side-nav">
        	<ul>
            	<li class="parent-nav"><a href="index.php?page=attendance">Credential/Attendance</a></li>
				
                <li class="parent-nav"><a href="#"  id="logout_me">Logout</a>
                
            </ul>
        </nav>

        <?php }elseif($_SESSION["userlevel"]=="Canvasser"){
		
		?>
		
        <nav id="side-nav">
        	<ul>
            	
				<li class="parent-nav"><a href="#">Canvassing</a>
                	<ul class="child-nav">
                    	<li><a href="index.php?page=candidates">Candidates</a></li>
                    	<li><a href="index.php?page=cast_votes">Cast Votes</a></li>
                        <li><a href="index.php?page=cast_res_votes">Cast Resolution Votes</a></li>
                    </ul>
                    
                </li>
				
    			
                
                <li class="parent-nav"><a href="#"  id="logout_me">Logout</a>
 
                </li>
                
                
            </ul>
        </nav>
        
        <?php
		}
		?>