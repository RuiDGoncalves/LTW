var counterA = 1;
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
          $(x).append("<div><input type='text' class=answer name='answer"+y+counterA+"' placeholder='Answer'><br></div>");
          counterA++;
     }
   });
  $(".delanswer").click(function() {

     if (counterA > 1){
      var x = $(this).parent().attr('id');
      $("#"+x+" div:last-child").last().remove();

      counterA--;
 }
   });
  $(".addquestion").click(function() {
        if (counterQ == limit)  {
          alert("You have reached the limit of questions");
     }
     else {
          $("#multiple").append('<div id="dynamicQuestion'+counterQ+'"><input type="text" class="question" name="question'+counterQ+'" placeholder="Question" required><br><div id="dynamicAnswer'+counterQ+'"><input type="text" class="answer" name="answer'+counterQ+'0" placeholder="Answer" required><input type="button" class="addanswer" value="+"><input type="button" class="delanswer" value="x"><br></div></div>');
          counterQ++;
     }
   });
  $(".delquestion").click(function() {

     if (counterQ > 1){

      $("#multiple div:last-child").last().remove();

      counterQ--;
   }});
});