<script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/charts/jquery-1.7.1.min.js"></script>
<script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/charts/highcharts.js"></script>
 
 <script type="text/javascript">
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
        chart: {
			renderTo: 'container1',
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false
        },
        title: {
            text: 'Number of ABC students by Gender'
        },

            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
		credits: {
			enabled: false
		},
        series: [{
            type: 'pie',
            name: 'Gender of ABC Students',
            data: [
                ['Boys',   60],
                {
                    name: 'Girls',
                    y: 40,
                    sliced: true,
                    selected: true
                }
            ]
        }]
    });
});
</script>

<script type="text/javascript">
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
        chart: {
			renderTo: 'container2',
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false
        },
        title: {
            text: ' Number of ABC students by Age Group'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
		credits: {
			enabled: false
		},
        series: [{
            type: 'pie',
            name: 'Age Group',
            data: [
                ['15-20yrs',   450],
                ['20-22yrs',       268],
                {
                    name: 'Below 15yrs',
                    y: 128,
                    sliced: true,
                    selected: true
                },
                ['22-25yrs',    85],
                ['25-27yrs',     62],
                ['Others',   7]
            ]
        }]
    });
});
</script>
<script type="text/javascript">
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container3',
		},
            title: {
                text: 'Annual Student Admission by Board',
            },
            subtitle: {
                text: 'Chart Showing the Number of students admitted by each Board Annually',
            },
            xAxis: {
                categories: ['2001', '2002', '2003', '2004', '2005', '2006',
                    '2007', '2008', '2009', '2010', '2013', '2014']
            },
            yAxis: {
                title: {
                    text: 'Annual Admissions'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
		credits: {
			enabled: false
		},
		legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Board North',
                data: [70, 69, 95, 183, 139, 96, 145, 182, 215, 252, 265, 233]
            }, {
                name: 'Board South',
                data: [20, 80, 57, 86, 25, 113, 170, 220, 248, 241, 201, 141]
            }, {
                name: 'Board East',
                data: [90, 60, 35, 39, 10, 84, 135, 170, 186, 179, 143, 90]
            }, {
                name: 'Board West',
                data: [39, 42, 57, 85, 103, 66, 48, 119, 152, 170, 166, 142]
            }]
        });
    });
</script>
<script type="text/javascript">
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
        chart: {
			renderTo: 'container6',
            type: 'column',
            margin: 75,
            options3d: {
				enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Average amount of tuition fees for ABC programs by CP'
        },
		credits: {
			enabled: false
		},
        plotOptions: {
            column: {
                depth: 25
            }
        },
            xAxis: {
                categories: [
							'Air Cargo',
							'Arts',
							'Therapy',
							'Carpentry',
							'Electricity',
							'Forestry',
							'Tourism',
							'ICT',
							'Masonry',
							'Mechanics'
					]
            },
            yAxis: {
                title: {
                    text: 'Annual Admissions'
                },
                 },
				 series: [{
            name: 'Trades in VTCs',
            data: [100000, 500000, 300000, 200000, 150000, 450000, 230000, 190000, 320000, 180000]
        }]
    });
});
</script>
<script type="text/javascript">
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
        chart: {
			renderTo: 'container7',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                viewDistance: 25,
                depth: 40
            },
            marginTop: 80,
            marginRight: 40
        },

        title: {
            text: 'Trend of Enrolment into ABC Schools'
        },

        xAxis: {
            categories: ['2010', '2011', '2012', '2013']
        },

		credits: {
			enabled: false
		},
        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Number of Students'
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 20
            }
        },

        series: [{
            name: 'Boys in TSS',
            data: [20939, 27715, 30228, 34914],
            stack: 'male'
        }, {
            name: 'Boys in VTC',
            data: [3362, 6920, 8224, 10058],
            stack: 'male'
        }, {
            name: 'Boys in Polytechnics',
            data: [334, 1062, 1869, 2788],
            stack: 'male'
        }, {
             name: 'Girls in TSS',
            data: [23587, 27318, 28203, 29968],
            stack: 'female'
        }, {
            name: 'Girls in VTC',
            data: [3452, 4395, 5333, 5534],
            stack: 'female'
        }, {
            name: 'Girls in Polytechnics',
            data: [99, 223, 463, 647],
            stack: 'female'
        }]
    });
});
</script>
<script type="text/javascript">
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
            chart: {
			renderTo: 'container8',
                type: 'bar'
            },
            title: {
                text: 'Employment status among ABC Graduates by sex, age and trade'
            },
            xAxis: {
                categories: ['Tourism', 'Public Works', 'Veterinary', 'Laboratory', 'Forestry']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Employed Graduates'
                }
            },
		credits: {
			enabled: false
		},
		legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
                series: [{
                name: 'Employed',
                data: [900, 450, 600, 700, 800]
            }, {
                name: 'Unemployed',
                data: [150, 200, 300, 260, 150]
            }, {
                name: 'Other Status',
                data: [39, 89, 100, 78, 50]
            }]
        });
    });
		</script>

<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard <span>ABC Schools</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">ABC</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </div>
<div class="contentpanel">
	<div class="row">
    	<div class="col-md-6">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                  <div class="panel-btns">
                    
                    <a class="minimize" href="#">−</a>
                  </div><!-- panel-btns -->
                  <h4 class="panel-title">Number of ABC students by Gender</h4>
                </div>
                <div class="panel-body"><div style="width:100%; height: 300px; " id="container1"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                  <div class="panel-btns">
                    
                    <a class="minimize" href="#">−</a>
                  </div><!-- panel-btns -->
                  <h4 class="panel-title"> Number of ABC students by Age Group</h4>
                </div>
                <div class="panel-body">
                	<div style="width:100%; height: 300px;" id="container2"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                  <div class="panel-btns">
                    
                    <a class="minimize" href="#">−</a>
                  </div><!-- panel-btns -->
                  <h4 class="panel-title">Annual Student Admission by Grade</h4>
                </div>
                <div class="panel-body">
                	<div style="width:100%; height: 300px;" id="container3"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                  <div class="panel-btns">
                    
                    <a class="minimize" href="#">−</a>
                  </div><!-- panel-btns -->
                  <h4 class="panel-title">Average amount of tuition fees for ABC programs by Center</h4>
                </div>
                <div class="panel-body">
                	<div style="width:100%; height: 300px;" id="container6"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                  <div class="panel-btns">
                    
                    <a class="minimize" href="#">−</a>
                  </div><!-- panel-btns -->
                  <h4 class="panel-title">Trend of Enrolment into ABC Schools</h4>
                </div>
                <div class="panel-body">
                	<div style="width:100%; height: 300px;" id="container7"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                  <div class="panel-btns">
                    
                    <a class="minimize" href="#">−</a>
                  </div><!-- panel-btns -->
                  <h4 class="panel-title">Employment status among ABC Graduates by sex, age and trade</h4>
                </div>
                <div class="panel-body">
                	<div style="width:100%; height: 300px;" id="container8"></div>
                </div>
            </div>
        </div>
    </div>
</div>

