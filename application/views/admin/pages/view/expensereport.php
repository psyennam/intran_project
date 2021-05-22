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
          <label>From Date</label>
          <input type="date" id="txtfromdate" name="txtfromdate" class="form-control" autocomplete="off">
        </div>
        <div class="col-md-3 form-group">
          <label>To Date</label>
          <input type="date" id="txttodate" name="txttodate" class="form-control" autocomplete="off">
        </div>
        <div class="col-md-3 form-group">
          <label>Type</label>
          <select id="type" name="type" class="form-control">
            <option value="">Select</option>
            <option value="In City">In City</option>
            <option value="Out Of City">Out Of City</option>           
          </select>
        </div>
        <div class="col-md-3 form-group">
          <label>Employee Name</label>
          <select id="empname" name="empname" class="form-control">
            <option value=''>Select</option>
            <?php foreach($employee as $row){?>
              <option value="<?php echo $row->employee_code;?>"><?php echo $row->employee;?></option>
            <?php }?>
          </select>   
        </div>
        <div class="col-md-3">
          <button type="Submit" id="BtnSearch" class="btn btn-primary" value="Search" onclick="Search();">Search</button>
        </div>
      </div>
    </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border" style="text-align:center;">
            <h3 class="box-title" style="font-size:25px !important;">Expense List</h3>
          </div>
          <div class="box-header with-border">
            <div class="box-body">
              <table width=100% border=1 id="tableData"  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Action</th>
                  <th>Date</th>
                  <th>Employee Name</th>
                  <th>Expense Type</th>
                  <th>Amount</th>
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
  var type=$("#type").val();
  var empname=$("#empname").val();
  
  function Search(){
    tableData($("#empname").val(),$("#type").val(),$("#txtfromdate").val(),$("#txttodate").val());
  }

  function tableData(empname,type,fromdate,todate){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url('Report/expense_type');?>",
      data:{empname:empname,type:type,fromdate:fromdate,todate:todate},
      
      success:function(data){
        $('#table').html(data); 
      }
    })
  }
</script>
 