@extends('adminlte::page')

@section('title')
    Home   | Produits
@endsection

@section('content_header')
   
@endsection
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

<link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">

<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
<script nonce="bda266ea-31e0-4f29-9187-a0367abf720d">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))));z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script>
<style type="text/css">
  .row.row2{
       display: flex; 
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
  }
</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="row row2">
<div class="col-lg-3 col-xs-6">
<div class="small-box bg-blue">
<div class="inner">
<h3>{{\App\Models\Produit::count()}}</h3>
<p>Produits</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="{{url('/produits')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-xs-6">
<div class="small-box bg-green">
<div class="inner">
<h3>{{\App\Models\Entrepot::count()}}<sup style="font-size: 20px"></sup></h3>
<p>Entrepots</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="{{url('/entrepots')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-xs-6">

<div class="small-box bg-yellow">
<div class="inner">
<h3>{{\App\Models\User::count()}}</h3>
<p>Techniciens</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="{{url('/users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">

<div class="small-box bg-red">
<div class="inner">
<h3>{{\App\Models\Commande::count()}}</h3>
<p>Commandes</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="{{url('/commandes')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<div class="col-12 col-lg-12" style="height: 850px;">
								<div class="card card-default">
									<div class="card-header justify-content-center">
										<h2 class="text-center"><b style="color: #FFA500">Qauntité de stock par rapport quantité minimale </b></h2>
									</div>
									<div class="card-body" style="height:350px;">
										<canvas id="activity"></canvas>
									</div>
								</div>
							</div>

<script>
   var myarr1 = [];
   var myarr2 = [];
    myarrydates = [];
     ite = 0;
        myarr1.push(ite);
        myarr2.push(ite);
        console.log(myarr1);
    
     
      <?php foreach($arraysumquantity as $item): ?>
       list = <?php echo $item ?>; 
      
        myarr1.push(list);
    <?php endforeach; ?>
     
    <?php foreach($arraysumquantityminimal as $item): ?>
       list = <?php echo $item ?>; 
      
        myarr2.push(list);
    <?php endforeach; ?>
     
    



    var date = new Date();
date.setDate(date.getDate() - 7);


    for(i=myarr1.length;i>0;i--)
    {
      var date = new Date();
     date.setDate(date.getDate() - i);
     item = date.toString().slice(4,10);
      myarrydates.push(item);

    }
   
    console.log(myarrydates);
    
    console.log(myarr1); 
                /*======== 16. ANALYTICS - ACTIVITY CHART ========*/
  var activity = document.getElementById("activity");
  if (activity !== null) {
    var activityData = [
      {
        first: myarr1,
        second: myarr2,
        
      }
   
    ];

    var config = {
      // The type of chart we want to create
      type: "line",
      // The data for our dataset
      data: {
        labels: myarrydates,
        datasets: [
          {
            label: "Quantity General",
            backgroundColor: "transparent",
            borderColor: "rgb(82, 136, 255)",
            data: activityData[0].first,
            lineTension: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255,255,255,1)",
            pointHoverBackgroundColor: "rgba(255,255,255,1)",
            pointBorderWidth: 2,
            pointHoverRadius: 7,
            pointHoverBorderWidth: 1
          },
          {
            label: "Quantity Minimal",
            backgroundColor: "transparent",
            borderColor: "rgb(255, 199, 15)",
            data: activityData[0].second,
            lineTension: 0,
            borderDash: [10, 5],
            borderWidth: 1,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255,255,255,1)",
            pointHoverBackgroundColor: "rgba(255,255,255,1)",
            pointBorderWidth: 2,
            pointHoverRadius: 7,
            pointHoverBorderWidth: 1
          }
        ]
      },
      // Configuration options go here
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        scales: {
          xAxes: [
            {
              gridLines: {
                display: false,
              },
              ticks: {
                fontColor: "#8a909d", // this here
              },
            }
          ],
          yAxes: [
            {
              gridLines: {
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif",
                display: true,
                color: "#eee",
                zeroLineColor: "#eee"
              },
              ticks: {
                // callback: function(tick, index, array) {
                //   return (index % 2) ? "" : tick;
                // }
                stepSize: 50,
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif"
              }
            }
          ]
        },
        tooltips: {
          mode: "index",
          intersect: false,
          titleFontColor: "#888",
          bodyFontColor: "#555",
          titleFontSize: 12,
          bodyFontSize: 15,
          backgroundColor: "rgba(256,256,256,0.95)",
          displayColors: true,
          xPadding: 10,
          yPadding: 7,
          borderColor: "rgba(220, 220, 220, 0.9)",
          borderWidth: 2,
          caretSize: 6,
          caretPadding: 5
        }
      }
    };

    var ctx = document.getElementById("activity").getContext("2d");
    var myLine = new Chart(ctx, config);

    var items = document.querySelectorAll("#user-activity .nav-tabs .nav-item");
    items.forEach(function(item, index){
      item.addEventListener("click", function() {
        config.data.datasets[0].data = activityData[index].first;
        config.data.datasets[1].data = activityData[index].second;
        myLine.update();
      });
    });
  }


            

    </script>
    

</div>
@endsection
