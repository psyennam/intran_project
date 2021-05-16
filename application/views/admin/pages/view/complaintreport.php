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
        <!-- <div class="col-md-3 form-group">
          <label>Lead</label>
          <select id="type" name="type" class="form-control">
            <option value="">Select</option>
            <?php foreach($lead as $row){?>
            <option value="<?php echo $row->lead_code;?>"><?php echo $row->company_name;?></option>
            <?php }?>         
          </select>
        </div> -->
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
            <h3 class="box-title" style="font-size:25px !important;">Compliant List</h3>
          </div>
          <div class="box-header with-border">
            <div class="box-body">
              <table width=100% border=1 id="tableData"  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Assigned by</th>
                  <th>Remark</th>
                  <th>Complaint Completed Date</th>
                  <th>Status</th>
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
  var lead_code=$("#type").val();
  var empname=$("#empname").val();
  
  function Search(){
    tableData($("#empname").val(),$("#type").val(),$("#txtfromdate").val(),$("#txttodate").val());
  }

  function tableData(empname,lead_code,fromdate,todate){
    //alert(empname);
    $.ajax({
      type:"POST",
      url:"<?php echo base_url('Admin/complaint_type');?>",
      data:{empname:empname,lead_code:lead_code,fromdate:fromdate,todate:todate},
      
      success:function(data){
        $('#table').html(data); 
      }
    })
  }
</script>
 