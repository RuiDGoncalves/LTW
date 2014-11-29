var counter = 1;
var limit = 6;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<input type='text' name='myInputs[]' placeholder='Answer'><br>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}

function deleteInput(divName){

     //document.getElementById(divName).removeChild();

     var element = document.getElementById(divName);


     if (counter > 2){

      element.removeChild(element.lastChild);

      counter--;
 }
}