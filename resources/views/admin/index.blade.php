@extends('layouts.admin')

@section('content')
<div class="container-fluid admin-container">
    <h6>Admin Panel - Main </h6>
    <small>{{date('Y-m-d H:i:s')}}</small>
    <hr>
    <p>Welcome, {{Auth::user()->name}}.</p>
    <p>Here you may find the various utilities and tools to help monitor the GamersPlay backend.</p>
    <br>
    <br>
    <div class="row">

        <div class="col-md-4">
            <div style="text-align:center;">
                <div class="data-circle">
                    <p>{{$users}}</p>
                </div>
                <p>Total Users</p>
            </div>
        </div>
        <div class="col-md-4">
            <div style="text-align:center;">
                <div class="data-circle">
                    <p>{{$usersNew7d}}</p>
                </div>
                <p>New users in last 7 days</p>
            </div>
        </div>
        <div class="col-md-4">
            <div style="text-align:center;">
                <div class="data-circle">
                    <p>${{$earnings}}</p>
                </div>
                <p>Total Earnings</p>
            </div>
        </div>


        <div class="col-md-12" style="height:150px;"></div>
        <div class="col-md-12" style="padding:0 25px;">
            <h5>New users in last 7 days</h5>
            <hr>
            <div id="chart"></div>
        </div>
    </div>




</div>
@endsection

@push('scripts')

    <script src="{{asset('/js/apexcharts.min.js')}}"></script>
    <script>
        var seriesData = @json($count);
        var seriesDataCounts = [];
        var seriesDataDates = [];
        for(key in seriesData) {
            seriesDataCounts.push(seriesData[key]['users']);
            seriesDataDates.push(seriesData[key]['date']);
          
        }

         var options = {
          series: [{
          name: "New users",
          data: seriesDataCounts
        }],
          chart: {
          type: 'area',
          height: 350,
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        
        title: {
          text: '',
          align: 'left'
        },
        subtitle: {
          text: '',
          align: 'left'
        },
        labels: seriesDataDates,
        xaxis: {
          type: 'date',
          tickAmount: seriesDataCounts.length
        },
        yaxis: {
          opposite: true,
          labels: {
              formatter: function(val) {
                return val.toFixed(0);
              }
          },
          min:1,
          max: Math.max(seriesDataCounts) + 3,
        },
        legend: {
          horizontalAlign: 'left'
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
    
    </script>
@endpush