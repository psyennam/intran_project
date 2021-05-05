<!DOCTYPE html>
<html>
<head>
  <title>Hi Title</title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/AdminLTE.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/iCheck/square/blue.css');?>">
</head>
<body>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?= $orgdetails[0]->org_name; ?>, Inc.
            <small class="pull-right">Date:<?php echo date('d/m/Y');?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?= $orgdetails[0]->org_name; ?>, Inc.</strong><br>
            <?= $orgdetails[0]->address; ?></br>
            Email: <?=$orgdetails[0]->client_email;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?= company_name_quotation($closedetails[0]->lead_code);?></strong><br>
            <?= $supplierdetails[0]->Address; ?></br>
            Email: <?=$supplierdetails[0]->email;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Quotation Close Date:</b><?= __date_format($closedetails[0]->quotation_close_date,'dd/mm/yyyy'); ?><br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Rate</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($closedetails as $key) {?>
        <tr>
          <td><?php echo $key->quantity;?></td>
          <td><?php echo $key->product_code;?></td>
          <td><?php echo $key->rate;?></td>
        </tr>
        <?php }?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  <?php $rate=0; 
        $discount=0;
        $total=0;
  ?>
      <div class="row">
        <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
               <?php 
            foreach($closedetails as $key)
            {
              $rate+=$key->rate;
              $discount+=$key->discount;
              $total+=$key->total;
            }
          ?>
              <tbody>
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td><?= $rate; ?></td>
              </tr>
              <tr>
                <th>Discount:</th>
                <td><?= $discount; ?></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td><?= $total; ?></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</body>
</html>