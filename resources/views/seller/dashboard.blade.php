@extends('layouts.app')
@section('style')
    <style>
      .apexcharts-toolbar {
        margin-right:15px;
      }
    </style>
@endsection
@section('content')


<div class="header-page rounded">
  <div>
      <h1>Seller Dashboard</h1>
      <p>Here you may find the various resources for our sellers.</p>
  </div>
</div>
@if(Auth::user()->seller_vacation_mode == '1')
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Vacation Mode</h4>
  <p></p>
  <p class="mb-0">You currently have vacation mode enabled, this means you will not be able to receive any orders.</p>
</div>
@endif
    <div class="container-fluid">

        <div class="col-md-12">
          <a href="/seller/service/new" class="btn btn-primary">New Service</a>
          <a href="/seller/service/list" class="btn btn-primary">My Services</a>
          <a href="/seller/orders" class="btn btn-primary">Orders</a>
          <a href="/seller/withdrawals" class="btn btn-primary">Payouts</a>
          @if(Auth::user()->seller_vacation_mode == '0')
          <a href="#" class="btn btn-danger" id="vacationToggle" data-on="0">Vacation Mode | OFF</a>
          @else
          <a href="#" class="btn btn-success" id="vacationToggle" data-on="1">Vacation Mode | ON</a>
          @endif
          <br>
          <br>
          <hr>
      </div>
    </div>
    <div class="container-fluid">
        <div class="row">
     

            <div class="col-md-4">
                <div style="text-align:center;">
                    <div class="data-circle">
                        <p>{{$myServicesCount}}</p>
                    </div>
                    <p>My Services</p>
                </div>
            </div>
            <div class="col-md-4">
                <div style="text-align:center;">
                    <div class="data-circle">
                        <p>{{$totalEarnings}}</p>
                    </div>
                    <p>Total Earnings</p>
                </div>
            </div>
            <div class="col-md-4">
                <div style="text-align:center;">
                    <div class="data-circle">
                        <p>{{$totalOrders}}</p>
                    </div>
                    <p>Total Orders</p>
                    <br>
                </div>
            </div>


        </div>
        <hr>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" style="padding:0 25px;">
          <div class="subheader-page rounded">
            <h5>Earnings in last 7 days</h5>
          </div>
          <br>
          <div id="chart"></div>
      </div>
      </div>
    </div>
@endsection

@push('scripts')

<script src="{{asset('/js/apexcharts.min.js')}}"></script>
<script>
    // Apex.fill.colors = ['#F44336', '#E91E63', '#9C27B0'];
    var colorBG = getComputedStyle(document.documentElement)
    .getPropertyValue('--color-background');
    var earnings = @json($earnings);
    var dates = @json($dates);
    if(typeof earnings == 'object' && earnings.length > 0) {
      earnings.forEach((el,index) => {
        earnings[index] = Number(el);
      });
    }
    Apex.colors = [colorBG, 'red', 'blue'];

    var seriesDataCounts = [1,2,3];
    var seriesDataDates = dates;
       var options = {
      series: [{
      name: "Earnings (GP)",
      data: earnings
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
      curve: 'smooth'
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
    },
    fill: {
        colors:[colorBG],
        type: 'gradient',
          gradient: {
              shade: 'dark',
              type: "vertical",
              shadeIntensity: 0.5,
              gradientToColors: undefined,
              inverseColors: true,
              opacityFrom: 0.4,
              opacityTo: 0.9,
              stops: [0, 30, 100],
              colorStops: []
          },
    },
    legend: {
      horizontalAlign: 'left'
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

    $('#vacationToggle').click(function (e) { 

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var modeEnabled = this.dataset.on;
      e.preventDefault();
      Swal.fire({
        title: 'Vacation Mode',
        text: 'You wont be able to receive any orders while the mode is enabled.',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Enable',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: "/seller/vacationMode",
            data: {modeEnabled:modeEnabled},
            success: function (response) {
              if(response == 'Success') {
                window.location.reload();
              }
            }
          });
        }
      })
    });
      
</script>
@endpush