<!DOCTYPE html>
<html>

	<head>
		<title>Membuat Grafik dengan Highcharts</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	
		<script>
			$(function () {
			    $('#container').highcharts({
			        title: {
			            text: 'Data Penjualan 2016',
			            x: -20 //center
			        },
			        subtitle: {
			            text: 'PT. AKU CINTA INDONESIA',
			            x: -20
			        },
			        xAxis: {
			            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
			                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			        },
			        yAxis: {
			            title: {
			                text: 'Total'
			            },
			            plotLines: [{
			                value: 0,
			                width: 1,
			                color: '#808080'
			            }]
			        },
			        tooltip: {
			            valuePrefix: 'Rp.'
			        },
			        legend: {
			            layout: 'vertical',
			            align: 'right',
			            verticalAlign: 'middle',
			            borderWidth: 0
			        },
			        series: [{
			            name: 'Penjualan',
			            data: <?php echo json_encode($data);?>
			        }]
			    });
			});	
		</script>
	</head>
	<body>
			
		<div id="container"></div>	

		<script src="<?php echo base_url('assets/js/highcharts.js');?>"></script>
		<script src="<?php echo base_url('assets/js/modules/exporting.js');?>"></script>
	</body>

</html>