
$(document).ready(function() {
  var user;
  $.get('./getId.php', function(id) {
	if($("#search1").val()==""){
		$.get('./search.php?res='+'allPolls'+'&user='+id, function(polls) {
        if (!polls) {
        	$('#polls').html('<p class="noPolls">There are no Polls created / That you can see'+id+'</p>');
        } 
        else {
        	$('#polls').html(polls);
        }
   		});
	}
   $("#search1").keyup(function() {
   		var value= $(this).val();
   		if(value==""){
   			$.get('./search.php?res='+'allPolls'+'&user='+id, function(polls) {
        	if (!polls) {
        		$('#polls').html('<p class="noPolls">There are no Polls created / That you can see</p>');
        	} 
        	else {
        		$('#polls').html(polls);
        	}
   			});
   		}
   		else{
   			$.get('./search.php?res='+value+'&user='+id, function(polls) {
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
});