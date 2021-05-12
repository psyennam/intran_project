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
  <!-- jQuery 3 -->
  <script src="<?= base_url();?>asset/bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">
    const base_url = '<?= base_url(); ?>';
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Complaint Form</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post">
      <div class="box-body">
        <div class="form-group">
        <div>
          <label>Client number</label>
          <input type="text" class="form-control clientnumber" id="clientnumber" name="clientnumber" placeholder="Enter Client username">
        </div>
        <div>
          <label>invoice number</label>
          <select id="invoice" name="invoice" class="form-control invoice_number">
          </select>          <!-- <input type="email" class="form-control" id="quotation" placeholder="Enter quotation number"> -->
        </div>
        <div>
          <label>Product</label>
          <select id="product" name="product" class="form-control product">
          </select>
        </div>
        <div>
          <label>Warranty Type</label>
          <input type="text" class="form-control warranty" id="warranty" name="warranty">
        </div>
        <div>
          <label>purchace Date</label>
          <input type="date" class="form-control purchace" id="purchace" name="purchace">
        </div>
        <div>
          <label>Warranty expire Date</label>
          <input type="date" class="form-control expire" id="expire" name="expire">
        </div>
        <div>
          <label>mobile_Number</label>
          <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter mobile_Number">
        </div>
        <div>
          <label >Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <div>
          <label >Subject</label>
          <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
        </div>
        <div>
          <label >Discription</label>
          <input type="text" class="form-control" id="discription" name="discription" placeholder="description">
        </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
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

<script type="text/javascript">
   $(document).ready(function(){
    $('.clientnumber').change(function(){
      var lead_code = $(this).val();
      
      if(lead_code != "")
      {
        $.post(base_url+"/User/opt_invoice/"+lead_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value=""> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.code+'</option>';
            });
            $('#invoice').html(html);
          }
        })

      }
    })
});

   $(document).ready(function(){
    $('.invoice_number').change(function(){
      var invoice_number = $(this).val();
      
      if(invoice_number != "")
      {
        $.post(base_url+"/User/opt_product/"+invoice_number, function(res){
          res = $.parseJSON(res);
          var html = '<option value=""> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.product+'</option>';
            });
            $('#product').html(html);
          }
        })
      }
    })
});
   $(document).ready(function(){
    $('.product').change(function(){
      var product_code = $(this).val();
      var invoice_number=$("#invoice").val();
      alert(product_code);
      
      if(product_code != "")
      {
        $.post(base_url+"/User/opt_warranty/"+product_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value=""> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                $("#warranty").val(value.title);
                // $temp=value.date(yyyy-MM-dd)
                $("#purchace").val(value.start_at);
                $("#expire").val(value.end_at);
                alert(value.end_at);
                // html += '<option value="'+value.code+'">'+value.code+'</option>';
            });
            // $('#warranty').html(html);
          }
        })
      }
    })
});
</script>
</body>
</html>
