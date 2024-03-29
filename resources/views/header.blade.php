<html lang="en" style="height: auto;"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Password Manager</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('/public/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{url('/public/dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{url('/public/dashboard/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{url('/public/dashboard/plugins/ekko-lightbox/ekko-lightbox.css')}}">
  <link rel="stylesheet" href="{{url('/public/dashboard/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{url('/public/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('/public/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="{{url('/public/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/public/dashboard/dist/css/adminlte.min.css')}}">
  
  <link type="text/css" href="//gyrocode.github.io/jquery-datatables-alphabetSearch/1.2.5/css/dataTables.alphabetSearch.css" rel="stylesheet" />
<style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
.alphabet{
display: flex;
justify-content: space-evenly;
 margin-bottom:15px!important;
}

.alphabet-info-display{
align-self: center;
}
.alphabet a{
 padding: 4px!important;
}
.alphabet li{
margin: 1px;
}
.alphabet li a{
background: #dcdcdc;
color: #333 !important;
}
.alphabet a:hover{
background: #dcdcdc!important;
color: #333!important;
border: 1px solid #979797!important;
}
.content-wrapper{
  margin-left:0px !important;
}
.main-header{
  margin-left:0px !important;
  
}
@media screen  and (max-width: 400px) {
  .navbar-nav .nav-item .nav-link{
    padding-left:0px !important;
  }
}
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,4JUdGzvrMFDWrUUwY3toJATSeNwjn54LkCnKBPRzDuhzi5vSepHfUckJNxRL2gjkNrSqtCoRUrEDAgRwsQvVCjZbRyFTLRNyDmT1a1boZVfamily=Poppins&display=swap');
body{
  font-family: "Lato", sans-serif;
  font-weight: 700;
}
</style></head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper container-fluid border shadow">
@include('nav')
{{-- @include('aside') --}}