<script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/charts/jquery-1.7.1.min.js"></script>
<script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/charts/highcharts.js"></script>
<script type="text/javascript">
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container'
		},
		title: {
			text: 'IPRC Comparative Performance'
		},
				subtitle: {
			text: 'IPRC South, IPRC Kigali, IPRC North'
		},
		xAxis: {
			categories: ['Average Attendance', 'Average Anual Percentage', 'Average Passout', 'Average Dropout', 'Average Tacher Leave']
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Percentage'
			}
		},
		tooltip: {
			formatter: function() {
				var s;
				if (this.point.name) { // the pie chart
					s = ''+
						this.point.name +': '+ this.y +' Percentage';
				} else {
					s = ''+
						this.x  +': '+ this.y;
				}
				return s;
			}
		},
		credits: {
			enabled: false
		},
		labels: {
			items: [{
				html: 'Total No.of Students',
				style: {
					left: '40px',
					top: '8px',
					color: 'black'
				}
			}]
		},
		series: [{
			type: 'column',
			shadow:0,
			color: '#efc25d',
			name: 'IPRC South',
			data: [30, 10, 70, 30, 10]
		}, {
			type: 'column',
			shadow:0,
			color: '#f09447',
			name: 'IPRC Kigali',
			data: [20, 7, 90, 5, 35]
		}, {
			type: 'column',
			shadow:0,
			color: '#8ac8c3',
			name: 'IPRC North',
			data: [40, 5, 50, 25, 10]
		}, {
			type: 'spline',
			name: 'National TVET Average',
			//shadow:0,
			lineColor:'#ea90ab',
			lineWidth :4,
					marker: {
					enabled: true,
					symbol: 'circle',
					radius: 6,
					fillColor :'#ea90ab',
					lineColor : '#fff',
					lineWidth:2,

		},
			data: [35, 26, 17, 70, 20]
		}, {
			type: 'pie',
			shadow:0,
			name: 'Total No.of Students',
			data: [{
				name: 'IPRC South',
				y: 30,
				color: '#efc25d' // Jane's color
			}, {
				name: 'IPRC Kigali',
				y: 60,
				color: '#f09447' // John's color
			}, {
				name: 'IPRC North',
				y: 20,
				color: '#8ac8c3' // Joe's color
			}],
			center: [100, 80],
			size: 100,
			showInLegend: false,
			dataLabels: {
				enabled: false
			}
		}]
	});
});
</script>
<div class="pageheader">
      <h2><i class="glyphicon glyphicon-book"></i> Reports <span>TVET Schools</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">TVET</a></li>
          <li class="active">Reports</li>
        </ol>
      </div>
    </div>
<div class="contentpanel">
    	<div class="col-sm-9 col-lg-12">
<div class="panel panel-default">
<div class="panel-heading" style="position:relative;">

              <!-- panel-btns -->
              <div class="clear"></div>
              <h3 class="panel-title">IPRC Comparative Performance</h3>
</div>
<div class="panel-body"><div style="width:98.3%" id="container"></div>
</div>
</div>
<div class="panel panel-default">
	
	<div class="panel-heading" style="position:relative;">

              <!-- panel-btns -->
              <div class="clear"></div>
              <h3 class="panel-title">Summary Information for IPRCs and Polytechnics </h3>
</div>
    <div class="panel-body">
    
    <div class="table-responsive">
          <table class="table mb30">
            <thead>
            <tr>
                <th >
                    Province
                </th>
                <th >
                    District
                </th>
                <th>
                    Sector
                </th>
                <th>
                    Cell
                </th>
                <th>
                    Village
                </th>
                <th>
                    School Name
                </th>
                <th>
                    Status
                </th>
                <th>
                    Principal
                </th>
                <th>
                    Gender
                </th>
                <th>
                    No. Students
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Kigali City
                </td>
                <td>
                    Kicukiro
                </td>
                <td>
                    Niboyi
                </td>
                <td>
                    Gatare
                </td>
                <td>
                    Taba
                </td>
                <td>
                    <a href="#">IPRC Kigali</a>
                </td>
                <td>
                    Public
                </td>
                <td>
                    <a href="#">Eng.Diogene MULINDAHABI</a>
                </td>
                <td>
                    Mixed
                </td>
                <td>
                    <a href="#"> 1,690</a>
                </td>
            </tr>
        
            <tr>
                <td>
                     Southern Province
                </td>
                <td>
                     Huye
                </td>
                <td>
                     Ngoma
                </td>
                <td>
                     Butare
                </td>
                <td>
                     Bukinanyana
                </td>
                <td>
                    <a href="#">
                    IPRC South </a>
                </td>
                <td>
                     Public
                </td>
                <td>
                    <a href="#">
                    Dr. TWABAGIRA Barnabe </a>
                </td>
                <td>
                     Mixed
                </td>
                <td>
                    <a href="#">
                    809 </a>
                </td>
            </tr>
           
            <tr>
                <td>
                     Western Province
                </td>
                <td>
                     Karongi
                </td>
                <td>
                     Bushoki
                </td>
                <td>
                     Kayenza
                </td>
                <td>
                     Rwanzu
                </td>
                <td>
                    <a href="#">
                    IPRC West </a>
                </td>
                <td>
                     Public
                </td>
                <td>
                    <a href="#">
                    Eng. MUGIRANEZA Jean Bosco </a>
                </td>
                <td>
                     Mixed
                </td>
                <td>
                    <a href="#">
                    742 </a>
                </td>
            </tr>
            </tbody>
  
            </table>
          </div>
    	
    </div>
</div>
</div>
</div>