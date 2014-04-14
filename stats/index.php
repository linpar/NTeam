<?php
$XMLName = 'count.xml';
$date = date('Y-m-d',time());
$stats = simplexml_load_file($XMLName);
$total = $stats->downloads->count();
for($i=0; $i<$total-1; $i++)
	$downloads .= $stats->downloads[$i]. ', ';
$downloads .= $stats->downloads[$i];
?>
	<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>NTeam Downloads Chart</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    var data = [
        <?php echo $downloads;?>
    ];
    
    var masterChart,
        detailChart;
    
    $(document).ready(function() {
    
    
        // create the master chart
        function createMaster() {
            masterChart = $('#master-container').highcharts({
                chart: {
                    reflow: false,
                    borderWidth: 0,
                    backgroundColor: null,
                    marginLeft: 50,
                    marginRight: 20,
                    zoomType: 'x',
                    events: {
    
                        // listen to the selection event on the master chart to update the
                        // extremes of the detail chart
                        selection: function(event) {
                            var extremesObject = event.xAxis[0],
                                min = extremesObject.min,
                                max = extremesObject.max,
                                detailData = [],
                                xAxis = this.xAxis[0];
    
                            // reverse engineer the last part of the data
                            jQuery.each(this.series[0].data, function(i, point) {
                                if (point.x > min && point.x < max) {
                                    detailData.push({
                                        x: point.x,
                                        y: point.y
                                    });
                                }
                            });
    
                            // move the plot bands to reflect the new detail span
                            xAxis.removePlotBand('mask-before');
                            xAxis.addPlotBand({
                                id: 'mask-before',
                                from: Date.UTC(2014, 0, 11),
                                to: min,
                                color: 'rgba(0, 0, 0, 0.2)'
                            });
    
                            xAxis.removePlotBand('mask-after');
                            xAxis.addPlotBand({
                                id: 'mask-after',
                                from: max,
                                to: Date.UTC(2020, 11, 30),
                                color: 'rgba(0, 0, 0, 0.2)'
                            });
    
    
                            detailChart.series[0].setData(detailData);
    
                            return false;
                        }
                    }
                },
                title: {
                    text: null
                },
                xAxis: {
                    type: 'datetime',
                    showLastTickLabel: true,
                    maxZoom: 14 * 24 * 3600000, // fourteen days
                    plotBands: [{
                        id: 'mask-before',
                        from: Date.UTC(2014, 0, 11),
                        to: Date.UTC(2020, 11, 30),
                        color: 'rgba(0, 0, 0, 0.2)'
                    }],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    gridLineWidth: 0,
                    labels: {
                        enabled: false
                    },
                    title: {
                        text: null
                    },
                    min: 0.6,
                    showFirstLabel: false
                },
                tooltip: {
                    formatter: function() {
                        return false;
                    }
                },
                legend: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        fillColor: {
                            linearGradient: [0, 0, 0, 70],
                            stops: [
                                [0, '#4572A7'],
                                [1, 'rgba(0,0,0,0)']
                            ]
                        },
                        lineWidth: 1,
                        marker: {
                            enabled: false
                        },
                        shadow: false,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        enableMouseTracking: false
                    }
                },
    
                series: [{
                    type: 'area',
                    name: 'Downloads',
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2014, 0, 11),
                    data: data
                }],
    
                exporting: {
                    enabled: false
                }
    
            }, function(masterChart) {
                createDetail(masterChart)
            })
            .highcharts(); // return chart instance
        }
    
        // create the detail chart
        function createDetail(masterChart) {
   
            // prepare the detail chart
            var detailData = [],
                detailStart = Date.UTC(2014, 0, 11);
    
            jQuery.each(masterChart.series[0].data, function(i, point) {
                if (point.x >= detailStart) {
                    detailData.push(point.y);
                }
            });
    
            // create a detail chart referenced by a global variable
            detailChart = $('#detail-container').highcharts({
                chart: {
                    marginBottom: 120,
                    reflow: false,
                    marginLeft: 50,
                    marginRight: 20,
                    style: {
                        position: 'absolute'
                    }
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: 'NTeam Downloads'
                },
                xAxis: {
                    type: 'datetime'
                },
                yAxis: {
                    title: {
                        text: null
                    },
                    maxZoom: 0.1
                },
                tooltip: {
                    formatter: function() {
                        var point = this.points[0];
                        return '<b>'+ point.series.name +'</b><br/>'+
                            Highcharts.dateFormat('%A %B %e %Y', this.x) + ':<br/>'+
                            'Downloads = '+ point.y;
                    },
                    shared: true
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        marker: {
                            enabled: false,
                            states: {
                                hover: {
                                    enabled: true,
                                    radius: 3
                                }
                            }
                        }
                    }
                },
                series: [{
                    name: 'Downloads',
                    pointStart: detailStart,
                    pointInterval: 24 * 3600 * 1000,
                    data: detailData
                }],
    
                exporting: {
                    enabled: false
                }
    
            }).highcharts(); // return chart
        }
    
        // make the container smaller and add a second container for the master chart
        var $container = $('#container')
            .css('position', 'relative');
    
        var $detailContainer = $('<div id="detail-container">')
            .appendTo($container);
    
        var $masterContainer = $('<div id="master-container">')
            .css({ position: 'absolute', top: 300, height: 80, width: '100%' })
            .appendTo($container);
    
        // create master and in its callback, create the detail chart
        createMaster();
    });
    
});
		</script>
	</head>
	<body>
<script src="highcharts.js"></script>
<script src="exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
