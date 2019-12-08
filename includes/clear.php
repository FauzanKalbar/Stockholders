<script language="javascript">
$(document).ready(function(e) {
   
	$("#clear_votes").click(function(){
		 var conf_cv = confirm("Are you sure you want to clear Votes table?, \n Click Ok to Continue and Click Cancel if No.");
		 if(conf_cv==true){
			 $.post("modules/check_clear.php",{table: "tbl_votes"},function(data){
				 $("#feed-back").html(data);
			});
		 } 
	});
	
	$("#clear_stocks").click(function(){
		 var conf_cs = confirm("Are you sure you want to clear stocks table?, \n Click Ok to Continue and Click Cancel if No.");
		 if(conf_cs==true){
			 $.post("modules/check_clear.php",{table: "tbl_stocks"},function(){
				 $.post("modules/check_clear.php",{table: "tbl_stocks"},function(data){
				 	$("#feed-back").html(data);
				});
			});
		 } 
	});
	
});
	
</script>

<section id="section-1">
    	<article class="article-1">
        	<header>System Logs</header>
            	<button class="green_button" id="clear_votes">Clear Votes</button><button class="blue_button" id="clear_stocks">Clear Stocks Table</button><br><p id="feed-back"></p>
            <footer></footer>
        </article>
    </section>