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
    //get vote user

   });
 
 
 function vote(ol) {
 	var x=ol.id.replace('answer','');
 	$.get('./vote.php?poll='+x,function(ans){
     	if(ans==0)
    		alert("You already voted on this question/ You are not logged in");
    	else{
    		var y=document.getElementById(ol.id);
     		y.style.backgroundColor="#FBB117";
    	}
    });
 }
  function getvoteuser(ol){
 	var x=ol.id.replace('pergunta','');
  	$.get('./getVoteUser.php?quest='+x,function(ans){
  		var y='answer'+ans;
  		if(ans){
 			var x=document.getElementById(y);
     		x.style.backgroundColor="#FBB117";
    	}

    });
  }

  