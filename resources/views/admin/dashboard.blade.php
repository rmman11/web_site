@extends('admin.layouts.template-forms')
@section('title', 'Dashboard')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
      

           
          <p>Profile</p>

          {{ Auth::user()->name }}
     


 <div id="container"></div>



        </div>
    </div>
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var userData = <?php echo json_encode($userData)?>;
    Highcharts.chart('container', {
        title: {
            text: 'New User Growth, 2020'
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
                text: 'Number of New Users'
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
            name: 'New Users',
            data: userData
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