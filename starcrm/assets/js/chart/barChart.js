     var barChartData = {
          
            labels : ["June","July","August","October","November","December"],
            datasets : [
                {
                    fillColor : "rgba(106, 218, 228, 0.8)",
                    data : [65,59,70,67,56,55]
                },
                {
                    fillColor : "rgba(52, 152, 219, 0.8)",
                    data : [55,38,50,49,26,30]
                }
            ]

            
        }

    var myLine = new Chart(document.getElementById("canvas1").getContext("2d")).Bar(barChartData,{
        scaleShowLabels : false,
        pointLabelFontSize : 24
    });
