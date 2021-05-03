<!DOCTYPE html>
<html>
<head>
  <title>Hi Title</title>
</head>
<body>

  <table border="0">
    <thead>
      <tr>
        <th><h1>AdminLTE, Inc.</h1></th>
            <th style="text-align: right;"><h4>Date:<?php echo date('d-m-y');?></h4>
        </th>
      </tr>
    </thead>
  </table>

  <br><br><br>
  
  <table>
    <tbody>
      <tr>
        <td style="text-align: left;"> 
          From
            <strong>Tailor Made Erp.</strong><br>
            Surat<br>
            Pincode:-395010<br>
            Phone: (804) 123-5432<br>
            Email: info@TailorMadeErp.com
        </td>
        <td> 
          To
            <strong><?php foreach ($closedetails as $key ) {
            echo company_name_quotation($key->lead_code);
            } ?></strong><br>
            United State Of Pandesara<br>
            Phone: (555) 539-1037<br>
            Email: Som.Comapany@example.com
        </td>
        <td style="text-align: right;">
           <b>Invoice #007612</b><br>
            <br>
            <b>Order ID:</b> 4F3S8J<br>
            <b>Payment Due:</b> 2/22/2014<br>
            <b>Account:</b> 968-34567
        </td>
      </tr>
    </tbody>
  </table>

<br><br>

  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table border="1" style="text-align: center;">
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
  </div>

  <!-- /.col -->
  <?php $rate=0; 
        $discount=0;
        $total=0;
  ?>
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
          <tr>
          <th>Rate:-<?= $rate; ?></th>
          </tr>
          <tr>
          <th>Discount:-<?= $discount; ?></th>
          </tr>
          <tr>
          <th>Total:-<?= $total; ?></th>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
</body>
</html>