<!DOCTYPE html>
<html>
<head>
  <title>Hi Title</title>
</head>
<body>

  <table border="0">
    <thead>
      
      <tr>
        <th><h1><?= $orgdetails[0]->org_name; ?>, Inc.</h1></th>
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
            <strong><?= $orgdetails[0]->org_name; ?>.</strong><br>
            <?= $orgdetails[0]->address; ?><br>
            Email: <?=$orgdetails[0]->client_email;?>
        </td>
        <td> 
          To
            <strong><?= company_name_quotation($quotationdetails[0]->lead_code);?></strong><br>
            <?= $supplierdetails[0]->Address; ?><br>
            Email:<?=$supplierdetails[0]->email;?>
        </td>
        <td style="text-align: right;">
           <b>Invoice Number:-<?= $quotationdetails[0]->invoice_number;?></b><br>
           <b>Quotation Close Date:</b><?= __date_format($quotationdetails[0]->quotation_close_date,'dd/mm/yyyy'); ?><br>
          <b>Customer Number:-<?= $quotationdetails[0]->lead_code;?></b>
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
        <?php foreach($quotationdetails as $key) {?>
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
      <div class="table-responsive">
        <table class="table">
          <?php 
            foreach($quotationdetails as $key)
            {
              $rate+=$key->rate;
              $discount+=$key->discount;
              $total+=$key->total;
            }
          ?>
          <tbody>
              <tr>
                <th style="width:50%">Subtotal:-<?= $rate; ?></th>
                
              </tr>
              <tr>
                <th>Discount:-<?= $discount; ?></th>
                
              </tr>
              <tr>
                <th>Total:-<?= $total; ?></th>
              </tr>
              <tr>
                <td><strong>Note:-Customer Number Will be used For Complaint Registration.</strong>.</td>
              </tr>
            </tbody>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
</body>
</html>