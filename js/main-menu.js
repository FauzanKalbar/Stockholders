// JavaScript Document
$(document).ready(function(e) {
	


	
	$(".parent-nav:has(li) a").append("<div id='expand'>+</div>");
	
	
	$(".parent_nav").each(function(index, element) {
        
    });
	


	
	$(".parent-nav a").click(function(){

		if($(this).attr("class")=="active"){
			$("span",this).text("-");
			
		}else{
			$(".parent-nav a").removeClass("active", function(){
			$("#expand",this).text("+");
		});
			$(".child-nav:visible").slideUp();
			
		}
		
		
		$(this).parent(".parent-nav").children(".child-nav").stop(false, true).slideToggle("500", "swing");
		$(this).toggleClass("active");
		
		if($(this).attr("class")=="active"){
			$("#expand",this).text("-");
			
		}else{
			$("#expand",this).text("+");
			
		}

	});
	
	
	$("#logout_me").click(function(){
		$.post("logout.php",{},function(data){
			window.location="index.php";
		});
	});
	



	


	
	function openRpt(lnk) {
    window.open(lnk, "_blank", "toolbar=no, scrollbars=yes, resizable=no, top=20, left=20, width=800, height=900");
	}
	$("#cv").click(function(){
		openRpt("reports/canvassing_report.php");
	});
	$("#crv").click(function(){
		openRpt("reports/resolution_report.php");
	});
	
	$("#stmt").click(function(){
		openRpt("reports/statement_of_votes.php");
	});

	
	
	
});