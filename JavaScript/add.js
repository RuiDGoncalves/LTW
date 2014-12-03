var counterA = 1;
var counterQ = 1;
var limit = 10;

$(document).ready(function() {
   $("#addanswer").click(function() {
       if (counterA == limit)  {
          alert("You have reached the limit of answers for this question");
     }
     else {
          $("#dynamicAnswer").append("<div><input type='text' class=answer name='answer"+counterA+"' placeholder='Answer'><br></div>");
          counterA++;
     }
   });
  $("#delanswer").click(function() {

     if (counterA > 1){

      $("#dynamicAnswer div:last-child").last().remove();

      counterA--;
 }
   });
  $("#addquestion").click(function() {
        if (counterQ == limit)  {
          alert("You have reached the limit of questions");
     }
     else {
          $("#dynamicQuestion").append("<div id='q'><input type='text' id='question' name='question[]' placeholder='Question' required><br><div id='dynamicAnswer'><input type='text' id='answer' name='question[]' placeholder='Answer' required><input type='button' value='+' id='addanswer'><input type='button' value='x' id='delanswer'><br></div></div>");
          counterQ++;
     }
   });
  $("#delquestion").click(function() {

     if (counterQ > 1){

      $("#dynamicQuestion #q:last-child").last().remove();

      counterQ--;
   }});
});