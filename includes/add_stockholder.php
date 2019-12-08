	<section id="section-1">
    	<article class="article-1">
        	<header>Stockholders</header>
            <?php
				require_once 'config.gavs';
				$DB = new gavsClass;
				$qry = $DB->mysql("Select * From tbl_stocks");
				$qry->execute();
				$row = $qry->fetch_object();
				
				echo $row["lname"];		
			?>
                
                	
            <footer></footer>
        </article>
    </section>