   var lineChartData = {
            labels : ["Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
            datasets : [
                {
                    fillColor : "rgba(49, 195, 166, 0.2)",
                    strokeColor : "rgba(49, 195, 166, 1)",
                    pointColor : "rgba(49, 195, 166, 1)",
                    pointStrokeColor : "#fff",
                    data : [65,59,90,81,56,55,70]
                }
            ]
            
        }

    var myLine = new Chart(document.getElementById("canvas4").getContext("2d")).Line(lineChartData);