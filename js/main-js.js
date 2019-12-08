// JavaScript Document

$(document).ready(function(e) {
	$("#username").focus();
    $("input[type=text], input[type=password]").each(function(index, element) {
    	$(this).watermark($(this).attr("watermark"));
	}); 
	
	
	$.fn.get_res = function(){
		$.post("includes/fetch/break_down.php",{},function(data){
		
				$("#break_down").html(data);
				
			});
			
			$.post("includes/fetch/att_monitor.php",{},function(data){
		
				$("#fb-monitor").html(data);
				
			});	
		}
});

