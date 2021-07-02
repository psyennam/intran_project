<section class="content">
  <div class="box box-default">
    <!-- /.box-header -->
    <div class="box-body">
      <div class="pull-right"></div>
    </div>
    <!-- /.box-body -->
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-3 form-group">
          <label><?= __lang('From Date'); ?></label>
          <input type="date" id="txtfromdate" name="txtfromdate" class="form-control" autocomplete="off">
        </div>
        <div class="col-md-3 form-group">
          <label><?= __lang('To Date'); ?></label>
          <input type="date" id="txttodate" name="txttodate" class="form-control" autocomplete="off">
        </div>
        <div class="col-md-3 form-group">
          <label><?= __lang('Department'); ?></label>
          <select id="department" name="department" class="form-control">
            <option value="">Select</option>
            <?php foreach ($department as $key) { ?>
            <option value="<?= $key->department_code; ?>"><?= $key->department; ?></option>        
            <?php } ?>           
          </select>
        </div>
        <div class="col-md-3 form-group">
          <label><?= __lang('Role'); ?></label>
          <select id="role" name="role" class="form-control">
            <option value="">Select</option>
            <?php foreach ($role as $key) { ?>
            <option value="<?= $key->role_code; ?>"><?= $key->role; ?></option>        
            <?php } ?>
          </select>
        </div>
        <div class="col-md-3 form-group">
          <label><?= __lang('Designation'); ?></label>
          <select id="designation" name="designation" class="form-control">
            <option value="">Select</option>
            <?php foreach($designation as $row){?>
              <option value="<?php echo $row->designation_code;?>"><?php echo $row->designation;?></option>
            <?php }?>
          </select>   
        </div>
        <div class="col-md-1 form-group">
          <button type="Submit" id="BtnSearch" class="btn btn-primary form-control" value="Search" onclick="Search();"><?= __lang('Search'); ?></button>
        </div>
      </div>
    </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border" style="text-align:center;">
            <h3 class="box-title" style="font-size:25px !important;"><?= __lang('Employee List'); ?></h3>
          </div>
          <div class="box-header with-border">
            <div class="box-body">
              <table width=100% border=1 id="tableData"  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><?= __lang('ID'); ?></th>
                  <th><?= __lang('Employee Name'); ?></th>
                  <th><?= __lang('Department'); ?></th>
                  <th><?= __lang('Role'); ?></th>
                  <th><?= __lang('designation'); ?></th>
                  <th><?= __lang('Contact'); ?></th>
                  <th><?= __lang('Date'); ?></th>
                  <!-- <th>Action</th> -->
                  <!-- <th>Expense Type</th> -->
                  <!-- <th>Amount</th> -->

                </tr>
              </thead>
              <!-- <tbody>
              <?php foreach ($expensedetails as $key) { ?>
                <tr>
                  <td><?php echo $key->id;?></td>
                  <td><a href="<?php echo base_url('Test/exp/'.$key->id);?>"><button type="button" class="btn btn-primary">PDF</button></a></td>   
                  <td><?php echo __date_format($key->date,'ddmmyyyy');?></td>
                  <th><?php echo emp_name($key->employee_code);?></th>
                  <td><?php echo $key->type;?></td> 
                  <td><?php echo $key->amount;?></td>
                </tr> 
              <?php } ?>
              </tbody> -->
              <tbody id="table"></tbody>
              </table>  
            </div>       
          </div>
        </div>
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible" id="alertdelete" style="display:none !important;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>Details Deleted succeesfully</h4>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- /.content -->
<script>
  function formBack(){
    parent.history.back();
    return false;
  }
  
  var fromdate=$("#txtfromdate").val();
  var todate=$("#txttodate").val();
  var department=$("#department").val();
  var role=$("#role").val();
  var designation=$("#designation").val();
  
  function Search(){
    tableData($("#role").val(),$("#department").val(),$("#designation").val(),$("#txtfromdate").val(),$("#txttodate").val());
  }

  function tableData(role,department,designation,fromdate,todate){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url('Report/employee_type');?>",
      data:{role:role,department:department,designation:designation,fromdate:fromdate,todate:todate},
      
      success:function(data){
        $('#table').html(data); 
      }
    })
  }
</script>
 