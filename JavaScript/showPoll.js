$(document).ready(function() {
    var title=$('#poll').val();
    $.get('./getPoll.php?poll='+title, function(polls) {
        if (!polls) {
        	$('#polls').html('<p class="noPolls">There are no Polls with thata name</p>');
        } 
        else {
        	$('#polls').html(polls);
        }
   		});
   });