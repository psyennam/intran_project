<!-- Content Wrapper. Contains page content -->           
    <!-- Content Header (Page header) -->
<section class="content-header text-center" >
    <h1 style="text-transform: capitalize;"><b>Lead-List Data</b></h1>
  </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header text-center">
          <a href="<?= base_url('admin/leadform');?>"><button type="button" class="btn btn-success">Add</button></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Check In</th>
                <th>Company</th>
                <th>Supplier Name</th>
                <th>Brand</th>
                <th>Address</th>
                <th>Pincode</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
             <tbody>
              <?php foreach ($leaddetails as $key) { ?>
                <tr>
                  <td><?php echo $key->id;?></td>
                  <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" data-cmp="<?= $key->id;?>">Check In</button></td>
                  <td><?php echo $key->company_name;?></td>
                  <td><?php echo $key->supplier_code; ?></td>
                  <td><?php echo $key->brand;?></td>  
                  <td><?php echo $key->address;?></td>
                  <td><?php echo $key->zip_code;?></td>  
                  <td><?php echo is_status($key->status);?></td>
                  <!-- <td><a href="updateclient?client_code=<?php echo $key->client_code;?>"><button type="button" class="btn btn-primary">UPDATE</button></a></td>
                  <td><a href="deleteclient?client_code=<?php echo $key->client_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td> -->      
                </tr> 
              <?php } ?>

            <input type="hidden" id="hdnId">
            <input type="hidden" id="hiddenabc">

            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="abc"></h4>
                    <h4 class="modal-title">Available / Not Available</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row" style="text-align:center;">
                      <div class="col-md-12">
                        <div class="col-md-12 form-group">
                          <input type="submit" id="btnAvailable" class="btn btn-primary" value="Customer Available">
                        </div>
                        <div class="col-md-12 form-group">
                          <input type="submit" id="btnNotAvailable" class="btn btn-primary" value="Customer Not Available" onclick="notavailable();">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modal-default1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="checkabc"></h4>
                    <h4 class="modal-title">CheckOut</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-md-12 form-group">
                          <label>Contact Person</label>
                          <select id="cperson" class="form-control">
                          </select>
                        </div>
                        <div class="col-md-12 form-group">
                          <label>Remark</label>
                          <textarea id="remark" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                          <div class="alert alert-success alert-dismissible" id="alertsuccess" style="display:none !important;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>CheckOut Successfully</h4>
                            
                          </div>
                        </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <input type="submit" id="btnCheckout" class="btn btn-primary" value="CheckOut" onclick="checkout();" style="margin-top: 22px;">
            </div>
          </div>
        </div>
      </div>
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
 
 <script>
$(document).ready(function() {
    tableData();
  });
  
  function tableData(){
    $.ajax({
        type:"POST",
        url:"getLead.php",
        data:{},
        success:function(response){
            $("#tableData").html(response);
                $('#tableData').DataTable( {
                "destroy":true,
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false,
                "scrollX": true,
                "pageLength": 20
              } );
        }
    });
    
  }
  
  
  
  /* function showmodal(id){
    $("#hdnId").val(id);
        $.ajax({
        type:"POST",
        url:"getEmployeeInfo.php",
        dataType:"JSON",
        data:{id:id},
        success: function(response){
          console.log(response);
          $("#ename").html(response[0]["name"]);
          $("#eaddress").html(response[0]["address"]);
          $("#ephoto").html(response[0]["photo"]);
        },
      });
      viewmodal.style.display="block";
    }
    function hidemodal(){
      viewmodal.style.display="none";
    }
   */
  
  
  function openform(){
    $(location).attr('href','LeadForm.php');    
  }
  function deactive(id){
    var ans=confirm("Are You Sure To Deactive This Record ?");
    if(ans==true){
      $.ajax({
        type:"POST",
        url:"deactiveLead.php",
        data:{id:id},
        success:function(response){
          if($.trim(response)=="success"){
            alert("Record Deactive Successfully");
            tableData();
          }
          else{
            alert("Record Not Deleted");
          }
        }
      });
    }
  }
  function active(id){
    var ans=confirm("Are You Sure To Active This Record ?");
    if(ans==true){
      $.ajax({
        type:"POST",
        url:"activeLead.php",
        data:{id:id},
        success:function(response){
          if($.trim(response)=="success"){
            alert("Record Active Successfully");
            tableData();
          }
          else{
            alert("Record Not Deleted");
          }
        }
      });
    }
  }
  function checkin(id){
    $("#hdnId").val(id);
    $("#checkabc").html($("#company"+id).html());
    $("#abc").html($("#company"+id).html());
    $("#modal-default").modal('show');
  }
  function notavailable(){
    $.ajax({
      type:"POST",
      url:"getLeadContactName.php",
      data:{id:$("#hdnId").val()},
      success:function(response){
        console.log(response);
        $("#cperson").html(response);
      },
    });
    
    $("#modal-default").modal('hide');
    $("#modal-default1").modal('show');
  }
  function available(){
    $("#modal-default").modal('hide');
    $("#modal-default1").modal('hide');
    alert("hii");
  }
</script>