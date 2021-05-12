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
                <th>Warranty Type</th>
                <th>expire Date</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach($quotationdetails as $key) { ?>
                <tr>
                  <td><?php echo $key->id;?></td>
                  <td><a href="<?php echo base_url('Test/close/'.$key->quotation_code);?>"><button type="button" class="btn btn-primary">PDF</button></a></td>
                  <td><?= $key->invoice_number; ?></td>
                  <td><?php echo client_name($key->lead_code);?></td>
                  <td><?php echo __date_format($key->quotation_close_date,'ddmmyyyy');?></td>
                  <?php if($key->warranty_type==null){ ?>
                    <td><button type="button" class="btn btn-success lead-modal" data-invoice_number="<?= $key->invoice_number;?>">Add</button>
                    </td>
                  <?php } ?>
                  <td></td>
                  <td><?php echo __date_format($key->quotation_close_date,'expire_date');?></td>
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
<div class="modal fade" id="modal-default">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Warranty Type</h4>
          </div>
          <form method="post" action="<?php echo base_url('Warranty/update_warranty'); ?>">
          <div class="modal-body">
            <div class="row" style="text-align:center;">
              <div class="col-md-12">
                <input type="text" id="hdnId" name="invoice_number">
                <div class="form-group col-md-12">
                  <label>Warranty Type</label>
                  <select name="warrantytype_combo">
                    <?php foreach ($warrantytype as $key) {?>
                    <option value="<?php echo $key->warranty_type_code; ?>"><?= $key->title; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Next">
          </div>
          </form>
        </div>
      </div>
    </div>
<script>
  $(document).ready(function(){  
   $('.lead-modal').click(function(){
      $('#hdnId').val($(this).data('invoice_number'));
      $('#modal-default').modal('toggle');
    })
  })
</script>
 