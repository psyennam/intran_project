<!-- Content Wrapper. Contains page content -->           
    <!-- Content Header (Page header) -->
<!-- section class="content-header text-center" >
    <h1 style="text-transform: capitalize;"><b>Lead-List Data</b></h1>
  </section> -->

<!-- Main content -->

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
              <b style="font-size: 20px;"><?= __lang('Lead Data'); ?></b>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 ">
              <a href="<?= base_url('Admin/leadform');?>"><button type="button" class="btn btn-success pull-right"><?= __lang('Add'); ?></button></a>
            </div>
          </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><?= __lang('ID'); ?></th>
                <th><?= __lang('Check In'); ?></th>
                <th><?= __lang('Company'); ?></th>
                <th><?= __lang('Supplier Name'); ?></th>
                <th><?= __lang('Brand'); ?></th>
                <th><?= __lang('Address'); ?></th>
                <th><?= __lang('Pincode'); ?></th>
                <th><?= __lang('Status'); ?></th>
                <th><?= __lang('Update'); ?></th>
                <th><?= __lang('Delete'); ?></th>
              </tr>
            </thead>
             <tbody>
              <?php foreach ($leaddetails as $key) { ?>
                <tr>
                  <td><?php echo $key->id;?></td>
                  <td><button type="button" class="btn btn-success lead-modal" data-lead_code=<?= $key->lead_code;?> data-company_name=<?= $key->company_name; ?>>Check In</button></td>
                  <td><?php echo $key->company_name;?></td>
                  <td><?php echo $key->supplier_code; ?></td>
                  <td><?php echo $key->brand; ?></td>  
                  <td><?php echo $key->address;?></td>
                  <td><?php echo $key->zip_code;?></td>  
                  <td><?php echo is_status($key->status); ?></td>
                  <td><a href="updatelead?lead_code=<?php echo $key->lead_code;?>"><button type="button" class="btn btn-block btn-primary">UPDATE</button></a></td>
                  <td><a href="deletelead?lead_code=<?php echo $key->lead_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>      
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
    <div class="modal-dialog" style="width: 900px;height: 500px;">
      <div class="modal-content">

        <div class="modal-header">
          <input type="text" id="hiddenabc">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="abc"></h4>
          <h4 class="modal-title">Available / Not Available</h4>
        </div>
          <form method="post" enctype="multipart/form-data" action="<?= base_url('Admin/leadlist_insert'); ?>">
        <div class="modal-body">
          <div class="row" style="text-align:center;">
            <div class="col-md-12">
              <select class="form-control" name="customercombo" id="customercombo" onchange="check()">
                <option value="">---Select----</option>
                <option value="Customer Availabel" id="CA">Customer Availabel</option>
                <option value="Customer Not Availabel" id="CNA">Customer Not Availabel</option>
              </select>
            </div>
          </div>

          <input type="text" id="hdnId" name="lead_code">
            <div id="maindiv">
              <div id="hiddendiv">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group col-md-6">
                      <label>Visite Type<span style="color:red">*</span></label>
                      <select id="visitetype" name="visitetype" class="form-control">
                        <option value="1">Customer called</option>
                        <option value="2">Made a cold call visit</option>
                        <option value="3">phone call</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Concerned person is Same?<span style="color:red">*</span></label>
                      <select id="concernperson" name="concernperson" class="form-control Concernperson" onchange="getcontactdiv();">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Person Name<span style="color:red">*</span></label>
                      <select id="Personname" name="Personname" class="form-control Personname">
                      </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label>Quotation Required<span style="color:red">*</span></label>
                      <select id="quotationreq" name="quotationreq" class="form-control">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6" id="getremarkdivs">
                      <label>Additional Remarks</label>
                      <textarea id="remark" name="remark" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-6" id="getremarkdivs">
                        <div id="alert-msg"></div>                      
                    </div> 
                  </div>
                </div>
            </div>
            <div id="ContactPerson" style="display: none;">
              <div class="box-header with-border" id="addcontactdivs">
                <h3 class="box-title">Contact Person</h3>
              </div>
              <div class="row" id="addcontactdiv">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table id="sample_data" class="table table-bordered table-striped" width="100%">
                      <thead>
                        <tr>
                          <th class="span2" width="10%">Option</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Mobile</th>
                          <th>Email id</th>
                        </tr>
                      </thead>
                      <tbody id="product_table_body">
                        <tr>
                          <td style="text-align:center !important;"><a href="javascript:void(0);" class="addCF"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                          <td><input type="text" id="cp_name" name="cp_name[]"></td>
                          <td><input type="text" id="cp_designation" name="cp_designation[]"></td>
                          <td><input type="text" id="cp_mobile" name="cp_mobile[]"></td>
                          <td><input type="text" id="cp_email" name="cp_email[]"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
              <div class="row" >
                  <div class="col-md-3">
                    <a href="#">
                      <!-- <input class="btn btn-primary" id="submit" name="submit" type="button" value="<?= __lang('Submit');?>"/> -->
                        <button class="btn btn-primary"><?= __lang('Submit');?></button>
                      </a>
                  </div>
                </div>
            </div>
          </form>
          
          <form method="post">
            <div class="hiddendiv2" id="hiddendiv2" style="display: none;">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12 form-group">
                    <label>Contact Person</label>
                    <input type="text" name="cperson" id="cperson" class="form-control">
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
          </form>

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
<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 <script>
$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
$(document).ready(function(){  
   $('.lead-modal').click(function(){
      $('#hdnId').val($(this).data('lead_code'));
      $res=$('#hiddenabc').val($(this).data('company_name'));
      $('#abc').val($res);
      $('#modal-default').modal('toggle');
    })
  })

function check(){
  // $("#customercombo").val()=="Customer Availabel"? $("#hiddendiv").show():$("#hiddendiv2").hide();
  if($("#customercombo").val()=="Customer Availabel")
  {
    $("#maindiv").show();
    $("#hiddendiv2").hide();
  }
  else{
    $("#maindiv").hide();
    $("#hiddendiv2").show(); 
  }
}

function getcontactdiv(){
    if($("#concernperson").val()==""){
      $("#ContactPerson").hide();
      $("#Personname").val("").change().attr('readonly',true);
    }
    else if($("#concernperson").val()=="Yes")
    {
      var lead_code=$("#hdnId").val();
      alert(lead_code);
      /*var lead_code=$("#hdnId").val();
      alert(lead_code);*/
       if(lead_code != "")
      {

        $.post(base_url+"/Admin/opt_personname/"+lead_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.person_name+'">'+value.person_name+'</option>';
            });
            $('#Personname').html(html);
          }
        })

      }
      $("#Personname").attr('readonly',false);
      $("#ContactPerson").hide();

    }
    else{
      $("#ContactPerson").show();
      $("#Personname").val("").change().attr('readonly',true);
    }
}

var count=0;
var rows=0;

$(".addCF").click(function(){
if(rows<2){
  rows++;
  count++;
  $("#product_table_body").append('<tr id="newrow"><td style="text-align:center !important;"><span class="xyza'+count+'"></span></td><td><input type="text" id="cp_name'+count+'" name="cp_name[]"></td><td><input type="text" id="cp_designation'+count+'" name="cp_designation[]"></td><td><input type="text" id="cp_mobile'+count+'" name="cp_mobile[]"></td><td><input type="text" id="cp_email'+count+'" name="cp_email[]"></td></tr>');
  
  var z = '<a href="javascript:void(0);" class="remCF"><i class="fa fa-minus" aria-hidden="true" style="color:red;"></i></a>';
  $('.xyza'+count).html('');
  for(var n=1; n <= count; n++){
    if(n == count){
      $('.xyza'+n).html(z);
    }else{
      $('.xyza'+n).html('');
    }
  }
}
});

$("#product_table_body").on('click','.remCF',function(){
  count--;
  rows--;
  var z = '<a href="javascript:void(0);" class="remCF"><i class="fa fa-minus" aria-hidden="true" style="color:red;"></i></a>';
  $('.xyza'+count).html('');
  for(var n=1; n <= count; n++){
    if(n == count){
      $('.xyza'+n).html(z);
    }else{
      $('.xyza'+n).html('');
    }
  }
  $('#product_table_body tr:last').remove();
});

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
  var id = $("#hdnId").val();
  //URL: "customerdiscussion.php?id="+id;
  $(location).attr('href',"<?= base_url('Admin/discuss'); ?>?id="+id);   
}

/***
lead Checkout Validation
***/
  $('#submit').click(function() {
    var form_data = {
        customercombo: $('#customercombo').val(),
        visitetype: $('#visitetype').val(),
        concernperson: $('#concernperson').val(),
        Personname: $('#Personname').val(),
        quotationreq: $('#quotationreq').val(),
        remark: $('#remark').val(),
    };
    
    $.ajax({
        url: "<?php echo base_url('Admin/leadlist_insert'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == "Yes")
             window.location.href="<?php echo base_url('Admin/role'); ?>";
            else if (msg == 'NO')
                alert("Data is not inserted into database");
            else
               $('#alert-msg').html('<div style="color:red;">' + msg + '</div>');
        }
    });
    return false;
});
</script>