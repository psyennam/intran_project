<!DOCTYPE html>
<html>
<head>
  <title>Hi Title</title>
</head>
<body>

  <table border="0">
    <thead>
      <?php foreach($expensedetails as $key) {?>
      <tr>
        <th><h1>Tailor Made Erp.Inc</h1></th>
        <th style="text-align: right;"><h4>Date:<?php echo __date_format($key->created_at,'ddmmyyyy');?></h4></th>
      </tr>
      <?php }?>
    </thead>
  </table>

  <br><br><br>
  
  <table>
    <tbody>
      <?php foreach($expensedetails as $key) {?>
      <tr>
        <td style="text-align: left;"> 
            From
            <strong><?php echo emp_name($key->employee_code);?></strong><br>
            <?php echo emp_address($key->employee_code);?><br>
            Phone:<?php echo emp_contact($key->employee_code);?><br>
            Email:<?php echo emp_email($key->employee_code);?>
        </td>
        <td> 
          To
            <strong>Tailor Made Erp.</strong><br>
            Surat<br>
            Pincode:-395010<br>
            Phone: (804) 123-5432<br>
            Email: info@TailorMadeErp.com
        </td>
        <td style="text-align: right;">
            <b>Status:</b><?php echo is_status($key->status);?><br>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>

<br><br>

<div>
  <div>
    <table border="1">
      <thead>
        <tr>
          <th>PIC</th>
          <th>Remark</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($expensedetails as $key) {?>
        <tr>
          <td style="text-align: center;"><img src="<?php echo $key->expense_image;?>" width="100px" height="100px"></td>
          <td><?php echo $key->description;?></td>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>

  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table border="1" style="text-align: center;">
        <thead>
        <tr>
          <th>Expense Amount</th>
          <th>Approoved Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($expensedetails as $key) {?>
        <tr>
          <td><?php echo $key->amount;?></td>
          <td><?php echo $key->amount;?></td>
        </tr>
        <?php }?>
        </tbody>
      </table>
    </div>
  </div>

  <div>
    <div>
      <table>
        <thead>
          <tr>
            <th>Signature</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Tailor Made Erp.Inc</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>