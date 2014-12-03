var counterA = 1;
var counterQ = 1;
var limit = 10;

$(document).ready(function() {
   $("#search1").keypress(function() {
        $.ajax({ url: '../search.php' });
   });
});