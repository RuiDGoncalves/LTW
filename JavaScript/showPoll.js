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
   });
  function functionColor(ol) {
 		var x=document.getElementById(ol.id);
     	x.style.backgroundColor="#FBB117";
     	
     }
 
 
 function vote(ol) {

 	$.get('./vote.php?poll='+$('#tit').val(),function(ans){
    	
    });
 }
  function getvoteuser(ol){
  	$.get('./getVoteUser.php?poll='+$('#tit').val(),function(ans){
    	//return 2d array
    });
  }