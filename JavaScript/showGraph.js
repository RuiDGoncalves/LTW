
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
   function drawChart() {
      var id=$('#quest').val();
      var name=$('#questname').val();
      $.get('./getArray.php?id='+id, function(poll) {
        alert(poll);
        var x=JSON.parse(poll);
        
        var answer= [];
        answer.push(['Answers','Votes']);
        for(var i=0;i<x.length;i++)
          answer.push([x[i][0],x[i][1]]);     
        
          var gg=[['Task', 'xxx'],['Work',     11],['Eat',      2],['Commute',  2],['Watch TV', 2],['Sleep',    7]];

        var data = google.visualization.arrayToDataTable(answer);

        var options = {
          title: name,
          backgroundColor: "transparent",
          is3D: true,
         legend: {textStyle: {color: 'white'}},
         titleTextStyle: {color: "white"}
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico'));
        chart.draw(data, options);
      });
    }