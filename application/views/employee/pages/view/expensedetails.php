<!-- Content Wrapper. Contains page content -->           
    <!-- Content Header (Page header) --><!-- 
<section class="content-header text-center" >
    <h1 style="text-transform: capitalize;"><b>Expense-List</b></h1>
</section> -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
              <b style="font-size: 20px;"><?= __lang('Expense List'); ?></b>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 ">
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel"><?= __lang('Add');?></button>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><?= __lang('ID');?></th>
                <th><?= __lang('Action');?></th>
                <th><?= __lang('Date');?></th>
                <th><?= __lang('Expense Type');?></th>
                <th><?= __lang('Amount'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($expensedetails as $key) { ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><a href="<?php echo base_url('Test/exp/'.$key->id);?>"><button type="button" class="btn btn-primary">PDF</button></a></td>   
                  <td><?php echo __date_format($key->date,'ddmmyyyy');?></td>
                  <td><?php echo $key->type;?></td> 
                  <td><?php echo $key->amount;?></td>
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

 <!-- Modal Start  -->
    <div class="modal fade" id="mymodel">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-center text-primary">Expense Information</h3>  
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
          </div>
          <!-- Form Start  -->
            <form action="<?= base_url('Client/expenseinsert');?>" class="form-group" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Date<span style="color:red">*</span></label>
                      <input type="date" id="date" name="date" class="form-control">
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Type<span style="color:red">*</span></label>
                      <select id="expense_type" name="expense_type" class="form-control" onchange="gettype();">
                        <option value=''>Select</option>
                        <option value="In City">In City</option>
                        <option value="Out Of City">Out Of City</option>                
                      </select>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Description<span style="color:red">*</span></label>
                    <input type="text" id="description" name="description" class="form-control">
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Amount<span style="color:red">*</span></label>
                    <input type="text" id="amount" name="amount" class="form-control">
                  </div>
                </div>
                <div class="row" id="outofcity" style="display: none !important;">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Expense For<span style="color:red">*</span></label>
                    <select id="expense_for" name="expense_for" class="form-control">
                      <option value=''>Select</option>
                      <option value="Bus">Bus</option>
                      <option value="Train">Train</option>
                      <option value="Car">Car</option>                
                    </select>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Expenses Image<span style="color:red">*</span></label>
                    <input type="file" id="expimage" name="expimage[]" class="form-control">
                  </div>
                </div>
              </div>
                <div class="modal-footer">
                  <div class="row">
                    <div class="col-md-12 text-center" style="margin-top: 10px;">
                      <button type="submit" class="btn btn-primary"><?= __lang('Submit');?></button>
                    </div>
                  </div>
                </div>
              </form>
            <!-- End Form Start  -->
        </div>
      </div>
    </div>
    <!-- End Modal  -->
<script>
  function gettype() 
  {
    if($("#expense_type").val()=="")
    {
      $("#outofcity").hide();
      $("#amount").val("").attr("disabled",true);
    }
    else if($("#expense_type").val()=="In City")
    {
      $("#outofcity").hide();
      $("#amount").val(100).attr("disabled",false);
    }
    else
    {
      $("#outofcity").show();
      $("#amount").val("").attr("disabled",false);
    }
  }
</script>