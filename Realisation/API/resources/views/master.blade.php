<!DOCTYPE html>
<html lang="en">
<body  class="hold-transition sidebar-mini">
<head>
 @include('layouts/head')
</head>
  <!-- /.navbar -->
 @include('layouts/navbar')
  <!-- Main Sidebar Container -->
@include('layouts/sidebar')

  <!-- Content Wrapper. Contains page content -->
@yield('content')
@yield('AddTask')
@yield('editTask')

  <!-- /.content-wrapper -->
@include('layouts/footer')

  <!-- Control Sidebar -->
@include('layouts/scripts')
<!-- ./wrapper -->



<!-- Page specific script -->
</body>

</html>
