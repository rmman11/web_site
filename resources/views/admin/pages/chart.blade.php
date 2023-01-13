@extends('admin.layouts.template-forms')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                  
<div class="card" style="width: 1200px;">
    <div class="card-body">
    <div class="row">
    	
<div class="panel panel-default">
               <div class="panel-heading">See our products grphics</div>
             <div id="container"></div>
           </div>
       </div>
           
</div>
</div>
</div>  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var product = <?php echo json_encode($product)?>;
    Highcharts.chart('container', {
        title: {
            text: 'Product, 2022'
        },
        subtitle: {
            text: 'Source: positronx.io'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Number of Products'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Product',
            data: product
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
@endsection

