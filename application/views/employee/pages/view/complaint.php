<!-- Main content -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="col-md-12">
            <div class="box-header with-border" style="text-align:center;">
              <h3 class="box-title" style="font-size:25px !important;">Complaint List</h3>
            </div>
            <a href="#!" onclick="formBack();" class="btn btn-default btn-flat" style="margin-top: 8px;margin-right: 15px;">Back</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Add</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Description Name</th>
                <th>Email</th>
                <th>MobileNo</th>
                <th>complaint Issue Date</th>
                <th>Status</th>
              </tr>
            </thead>
             <?php foreach ($complaint as $key) { ?>
              <tr>
                  </td>
                  <td><?php echo $key->id;?></td>
                 <td><button type="button" class="btn btn-success lead-modal" data-complaint_code="<?= $key->complaint_code;?>">Add</button>
                  <td><?= client_name($key->customer_code)?></td>
                  <td><?= product_name($key->product_code)?></td>
                  <td><?= $key->description;?></td>
                  <td><?= $key->email;?></td>
                  <td><?= $key->mobile_no;?></td> 
                  <td><?= __date_format($key->created_at,'ddmmyyyy');?></td>
                  <td><?= is_status($key->status);?></td>
              </tr>
              <?php } ?>
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
            <h4 class="modal-title">Assign Technician</h4>
          </div>
          <form method="post" action="<?php echo base_url('Complaint/insert_complaint_tracking'); ?>">
          <div class="modal-body">
            <div class="row" style="text-align:center;">
              <div class="col-md-12">
                <input type="text" id="hdnId" name="complaint_code">
                <div class="form-group col-md-12">
                  <label>Technician</label>
                  <select name="warrantytype_combo">
                    <?php foreach ($technician as $key) {?>
                    <option value="<?php echo $key->employee_code; ?>"><?= $key->employee; ?></option>
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
  function formBack()
  {
    parent.history.back();
    return false;
  }
   $(document).ready(function(){  
   $('.lead-modal').click(function(){
      $('#hdnId').val($(this).data('complaint_code'));
      $('#modal-default').modal('toggle');
    })
  })
</script>