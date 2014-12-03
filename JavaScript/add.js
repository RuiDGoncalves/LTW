var counterA = [1,1,1,1,1,1,1,1,1,1];
var counterQ = 1;
var limit = 10;

$(document).ready(function() {
   $(".addanswer").click(function() {
       if (counterA == limit)  {
          alert("You have reached the limit of answers for this question");
     }
     else {
          var x = $(this).parent();
          var y = x.attr('id').substr(x.attr('id').length - 1);
          $(x).append("<div><input type='text' class=answer name='answer"+y+counterA[y]+"' placeholder='Answer'><br></div>");
          counterA[y]++;
     }
   });
  $(".delanswer").click(function() {

     if (counterA > 1){
        var x = $(this).parent();
        var y = x.attr('id').substr(x.attr('id').length - 1);
        var z = $(this).parent().attr('id');
        $("#"+z+" div:last-child").last().remove();

      counterA[y]--;
 }
   });
  $(".addquestion").click(function() {
        if (counterQ == limit)  {
          alert("You have reached the limit of questions");
     }
     else {
        counterA[counterQ]=1;
          $("#multiple").append('<div id="dynamicQuestion'+counterQ+'"><script type="text/javascript" src="JavaScript/add.js"></script><input type="text" class="question" name="question'+counterQ+'" placeholder="Question" required><br><div id="dynamicAnswer'+counterQ+'"><input type="text" class="answer" name="answer'+counterQ+'0" placeholder="Answer" required><input type="button" class="addanswer" value="+"><input type="button" class="delanswer" value="x"><br></div></div>');
          counterQ++;
     }
   });
  $(".delquestion").click(function() {

     if (counterQ > 1){

      $("#multiple div:last-child").last().remove();

      counterQ--;
   }});
});