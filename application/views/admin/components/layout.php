<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/Ionicons/css/ionicons.min.css">  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/skins/_all-skins.min.css">  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/morris.js/morris.css">  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/jvectormap/jquery-jvectormap.css">  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- Header -->
  <?php
  $this->load->view('admin/components/header');
  ?>
<!-- Navabar -->
  <?php
  $this->load->view('admin/components/nav');
  ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php if(!empty($page)){
          $this->load->view($page);
        } ?>
  </div>
<!-- /.content-footer -->
  <footer class="main-footer">
    <?php $this->load->view('admin/components/footer');?>
  </footer>

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>asset/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>asset/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>asset/bower_components/morris.js/morris.min.js"></script><!-- Sparkline -->
<script src="<?php echo base_url();?>asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>asset/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>asset/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script><!-- FastClick -->
<script src="<?php echo base_url();?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>asset/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>asset/javascript/scripts.js"></script>
<script>
  // $(function(){ 
  //   $('#example1').DataTable();
  //   $('#example2').DataTable({
  //     'paging'      : true,
  //     'lengthChange': false,
  //     'searching'   : false,
  //     'ordering'    : true,
  //     'info'        : true,
  //     'autoWidth'   : false
  //   })
  // }
</script>
</body>
</html>
