<!-- Content Wrapper. Contains page content -->           
    <!-- Content Header (Page header) -->
<!-- <section class="content-header text-center" >
    <h1 style="text-transform: capitalize;"><b>Quotation-CloseList</b></h1>
  </section>
 -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border" style="text-align:center;">
            <h3 class="box-title" style="font-size:25px !important;">Quotation-CloseList</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>PDF</th>
                <th>Invoice Number</th>
                <th>DealerShip Name</th>
                <th>Quotation Close Date</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach ($quotationdetails as $key) { ?>
                <tr>
                  <td><?php echo $key->id;?></td>
                  <td>PDF</td>
                  <td>InvoiceNumber</td>
                  <td><?php echo client_name($key->lead_code);?></td>
                  <td><?php echo __date_format($key->quotation_close_date,'ddmmyyyy');?></td>
                </tr> 
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
    <!-- /.content -->

 