<!DOCTYPE html>
<html lang="en">
<head>
 @include('layouts/head')
</head>
  <!-- /.navbar -->
 @include('layouts/navbar')
  <!-- Main Sidebar Container -->
@include('layouts/sidebar')

  <!-- Content Wrapper. Contains page content -->
@yield('content')



<!-- /.content-wrapper -->
@include('layouts/footer')

  <!-- Control Sidebar -->
@include('layouts/scripts')
<!-- ./wrapper -->
@php

$path = explode("/",$_SERVER['PHP_SELF']);
@endphp
@if ($path[2] == "dashboard")
{{-- include head for dashboard --}}
@include("layouts.head_dashboard")
@else
<!-- Page specific script -->
@endif




















</html>
