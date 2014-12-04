
$(document).ready(function() {
	if($("#search1").val()==""){
		$.get('./search.php?res='+'allPolls', function(polls) {
        if (!polls) {
        	$('#polls').html('<p class="noPolls">There are no Polls created</p>');
        } 
        else {
        	$('#polls').html(polls);
        }
   		});
	}
   $("#search1").keyup(function() {
   		var value= $(this).val();
   		if(value==""){
   			$.get('./search.php?res='+'allPolls', function(polls) {
        	if (!polls) {
        		$('#polls').html('<p class="noPolls">There are no Polls created</p>');
        	} 
        	else {
        		$('#polls').html(polls);
        	}
   			});
   		}
   		else{
   			$.get('./search.php?res='+value, function(polls) {
       		if (!polls) {
        		$('#polls').html('<p class="noPolls">No Results</p>');
        	} 
        	else {
        		$('#polls').html(polls);
        	}
   			});
   		}
       	
   });
});