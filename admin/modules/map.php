<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--Load the AJAX API-->
   
    <script type="text/javascript" src="<? echo $portalurl ?>/js/highcharts.js"></script>
    <script type="text/javascript" src="<? echo $portalurl ?>/js/highcharts-3d.js"></script>
    <script type="text/javascript" src="<? echo $portalurl ?>/js/canvas-tools.js"></script>
    <script type="text/javascript" src="<? echo $portalurl ?>/js/exporting.js"></script>

    <!-- <script type="text/javascript" src="https://www.google.com/jsapi"></script>
      <script type="text/javascript"> 

    //   // Load the Visualization API and the piechart package.
    //   google.load('visualization', '1.0', {'packages':['corechart']});

    //   // Set a callback to run when the Google Visualization API is loaded.
    //   google.setOnLoadCallback(drawChart);

    //   // Callback that creates and populates a data table,
    //   // instantiates the pie chart, passes in the data and
    //   // draws it.
    //   function drawChart() {

    //     // Create the data table.
    //     var data = new google.visualization.DataTable();
    //     data.addColumn('string', 'Topping');
    //     data.addColumn('number', 'Slices');
        
    //    data.addRows([
    //    
    //           ]);
    //     // Set chart options
    //     var options = {'title':'BÁO CÁO THỐNG KÊ DI SẢN VĂN HÓA HUYỆN HƯNG HÀ',
    //                    'width':500,
    //                    'height':450};

    //     // Instantiate and draw our chart, passing in some options.
    //     var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    //     chart.draw(data, options);
    //   }
    // </script>
    -->
 <style type="text/css">
    
   
    text[text-anchor='end']{
      display:none;
    }
    </style>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="container_chart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    <div id="chart_div"></div>
    <script type="text/javascript">
$(function () {
  Highcharts.theme = {
  colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
   chart: {
      backgroundColor: {
         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
         stops: [
            [0, 'rgb(255, 255, 255)'],
            [1, 'rgb(240, 240, 255)']
         ]
      },
      
      plotBackgroundColor: 'rgba(255, 255, 255, .9)',
      plotShadow: true,
      plotBorderWidth: 1
   },
   title: {
      style: {
         color: '#000',
         font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
      }
   },
   subtitle: {
      style: {
         color: '#666666',
         font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
      }
   },
   xAxis: {
      gridLineWidth: 1,
      lineColor: '#000',
      tickColor: '#000',
      labels: {
         style: {
            color: '#000',
            font: '11px Trebuchet MS, Verdana, sans-serif'
         }
      },
      title: {
         style: {
            color: '#333',
            fontWeight: 'bold',
            fontSize: '12px',
            fontFamily: 'Trebuchet MS, Verdana, sans-serif'

         }
      }
   },
   yAxis: {
      minorTickInterval: 'auto',
      lineColor: '#000',
      lineWidth: 1,
      tickWidth: 1,
      tickColor: '#000',
      labels: {
         style: {
            color: '#000',
            font: '11px Trebuchet MS, Verdana, sans-serif'
         }
      },
      title: {
         style: {
            color: '#333',
            fontWeight: 'bold',
            fontSize: '12px',
            fontFamily: 'Trebuchet MS, Verdana, sans-serif'
         }
      }
   },
   legend: {
      itemStyle: {
         font: '9pt Trebuchet MS, Verdana, sans-serif',
         color: 'black'

      },
      itemHoverStyle: {
         color: '#039'
      },
      itemHiddenStyle: {
         color: 'gray'
      }
   },
   labels: {
      style: {
         color: '#99b'
      }
   },

   navigation: {
      buttonOptions: {
         theme: {
            stroke: '#CCCCCC'
         }
      }
   }
};

var highchartsOptions = Highcharts.setOptions(Highcharts.theme);
    $('#container_chart').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Báo cáo thống kê di tích lịch sử văn hóa Hưng Hà - Thái Bình'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Tỷ lệ',
            data: [
                 <?
          $result_name_disan = $db->sql_query("SELECT * from " . $prefix . "_name_disan order by id ");
              while($row = $db->sql_fetchrow($result_name_disan)){
            
          ?>
             ['<?= $row['name']?>', <?= count_ditich_by_loai($row['id'])?>],
          <? }
        ?>
            ]
        }]
    });
});

    
  
    </script>
  </body>
</html>