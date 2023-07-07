

<!DOCTYPE html>
<html>
@include('components.links')
<body class="hold-transition skin-blue sidebar-mini">
    
<div class="wrapper">

 @include('components.header')
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('components.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
  

    <!-- Main content -->
    @include('pages.ManageRole.component.view_role_component')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('components.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    @include('components.black_sidebar')
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>

