<section class="content">
    <div class="box box-default">
        <div class="box-header with-border" style="display: none;" id="hiddendiv1">
		<h3 class="box-title">Discussion With Customer</h3>
	</div>
			
  	<!-- /.box-header -->
	<div class="box-body">
		<form method="post"  enctype="multipart/form-data">		
			<div style="display: none;" id="hiddendiv">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group col-md-3">
							<label>Concerned person is Same?<span style="color:red">*</span></label>
							<select id="concernperson" class="form-control" onchange="getcontactdiv();">
								<option value="">Select</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label>Quotation Required<span style="color:red">*</span></label>
							<select id="quotationreq" class="form-control">
								<option value="">Select</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label>Additional Remarks<span style="color:red">*</span></label>
							<select id="addremark" class="form-control" onchange="getremarkdiv();">
								<option value="">Select</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
						</div>
						<div class="form-group col-md-3" id="getremarkdivs">
							<label>Additional Remarks<span style="color:red;">*</span></label>
							<textarea id="remark" class="form-control"></textarea>
						</div>
					</div>
				</div>
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
										<td><input type="text" id="cp_name0"></td>
										<td><input type="text" id="cp_designation0"></td>
										<td><input type="text" id="cp_mobile0"></td>
										<td><input type="text" id="cp_email0"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group col-md-4">
							<input type="submit" class="btn btn-primary" value="Next" id="btnSubmit" onclick="formsubmit();">
						</div>
					</div>
					<div class="col-md-12">
						<div class="alert alert-success alert-dismissible" id="alertsuccess" style="display:none !important;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4>Details Saved succeesfully</h4>
						</div>
						<div class="alert alert-success alert-dismissible" id="alertsuccessupdate" style="display:none !important;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4>Details Updated succeesfully</h4>
						</div>
						<div class="alert alert-success alert-dismissible" id="alertsuccessdeactive" style="display:none !important;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4>Record Deactive Successfully</h4>
						</div>
						<div class="alert alert-success alert-dismissible" id="alertsuccessactive" style="display:none !important;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4>Record Active Successfully</h4>
						</div>
						<div class="alert alert-danger alert-dismissible" id="alerterror" style="display:none !important;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4>Error! Something Went wrong</h4>
						</div>
						<div class="alert alert-warning alert-dismissible" id="alertexist" style="display:none !important;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4>This State Already Exist</h4>
						</div>
					</div>
				</div>
			</div>
		</form>
		<input type="hidden" id="hiddenvisitetype">
		<input type="hidden" id="hiddencompany">
		<input type="hidden" id="hiddenproducttype">
		
		<div class="modal fade" id="modal-default2">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Company Name</h4>
					</div>
					<div class="modal-body">
						<div class="row" style="text-align:center;">
							<div class="col-md-12">
								<div class="form-group col-md-12">
									<label>Company Name<span style="color:red">*</span></label>
									<select id="company" class="form-control">
										<option value=''>Select</option><option value='1'>DENT MASTERS</option><option value='2'>EQUIP MASTERS</option>											</select>
								</div>
								<div class="form-group col-md-12">
									<label>Product Type<span style="color:red">*</span></label>
									<select id="producttype" class="form-control">
										<option value="1">Machinery Part</option>
										<option value="2">Spare Part</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<input type="submit" id="btnVisite" class="btn btn-primary" value="Next" onclick="companyname();">
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
						<h4 class="modal-title" id="abc"></h4>
						<h4 class="modal-title">Visite Type</h4>
					</div>
					<div class="modal-body">
						<div class="row" style="text-align:center;">
							<div class="col-md-12">
								<div class="form-group col-md-12">
									<label>Visite Type<span style="color:red">*</span></label>
									<select id="visitetype" class="form-control">
										<option value="Customer called">Customer called</option>
										<option value="Made a cold call visit">Made a cold call visit</option>
										<option value="Enquiry received by phone call from customer">phone call</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<input type="submit" id="btnVisite" class="btn btn-primary" value="Next" onclick="visite();">
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-default">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Quotation</h4>
					</div>
					<div class="modal-body">
						<div class="row" style="text-align:center;">
							<div class="col-md-12">
								<div class="col-md-12 form-group">
									<label>Do You Want To Create Quotation?</label>
								</div>
								<div class="col-md-12 form-group">
									<input type="submit" id="btnConfirm" class="btn btn-primary" value="Yes" onclick="confirm();">
								</div>
								<div class="col-md-12 form-group">
									<input type="submit" id="btnCancel" class="btn btn-primary" value="No" onclick="closeconfirm();">
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
		<div class="modal fade" id="modal-default3">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Quotation</h4>
					</div>
					<div class="modal-body">
						<div class="row" style="text-align:center;">
							<div class="col-md-12">
								<div class="col-md-12 form-group">
									<label>Quotation For This company and Product Type Alreday Exist. Do You Want To Create Same Quotation?</label>
								</div>
								<div class="col-md-12 form-group">
									<input type="submit" id="btnConfirm" class="btn btn-primary" value="Yes" onclick="repeatconfirm();">
								</div>
								<div class="col-md-12 form-group">
									<input type="submit" id="btnConfirm" class="btn btn-primary" value="Discard" onclick="discard();">
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
	</div>
</section>
<script>
	$(document).ready(function() {
		getcontactdiv();
		getremarkdiv();
		visitetype();
	});

function getcontactdiv(){
	if($("#concernperson").val()!=""){
		if($("#concernperson").val()=="No"){
			$("#addcontactdiv").show();
			$("#addcontactdivs").show();
		}
		else{
			$("#addcontactdiv").hide();
			$("#addcontactdivs").hide();
		}
	}
	else{
		$("#addcontactdiv").hide();
		$("#addcontactdivs").hide();
	}
}

function getremarkdiv(){
	if($("#addremark").val()!=""){
		if($("#addremark").val()=="Yes"){
			$("#getremarkdivs").show();
		}
		else{
			$("#getremarkdivs").hide();
		}
	}
	else{
		$("#getremarkdivs").hide();
	}
}
	var count=0;
	var totalrows=0;

$(".addCF").click(function(){
	count++;
	totalrows++;
	$("#product_table_body").append('<tr id="newrow"><td style="text-align:center !important;"><span class="xyza'+count+'"></span></td><td><input type="text" id="cp_name'+count+'"></td><td><input type="text" id="cp_designation'+count+'"></td><td><input type="text" id="cp_mobile'+count+'"></td><td><input type="text" id="cp_email'+count+'"></td></tr>');
	
	var z = '<a href="javascript:void(0);" class="remCF"><i class="fa fa-minus" aria-hidden="true" style="color:red;"></i></a>';
	$('.xyza'+count).html('');
	for(var n=1; n <= count; n++){
		if(n == count){
			$('.xyza'+n).html(z);
		}else{
			$('.xyza'+n).html('');
		}
	}
});

$("#product_table_body").on('click','.remCF',function(){
	count--;
	totalrows--;
	var z = '<a href="javascript:void(0);" class="remCF"><i class="fa fa-minus" aria-hidden="true" style="color:red;"></i></a>';
	$('.xyza'+count).html('');
	for(var n=1; n <= count; n++){
		if(n == count){
			$('.xyza'+n).html(z);
		}else{
			$('.xyza'+n).html('');
		}
	}
	//$(this).parent().parent().remove();
	$('#product_table_body tr:last').remove();
});

function formsubmit(){
	var rowdata=[];
	var z=0;
	for(z;z<=count;z++){
		item={};
		item["cp_name"]=$("#cp_name"+z).val();
		item["cp_designation"]=$("#cp_designation"+z).val();
		item["cp_mobile"]=$("#cp_mobile"+z).val();
		item["cp_email"]=$("#cp_email"+z).val();
		rowdata.push(item);
	}
	if($("#btnSubmit").val()=="Next"){
		$('form').ajaxForm({
			type:"POST",
			url:"saveDiscusion.php",
				data:{lead_id:"23",visit_type:$("#hiddenvisitetype").val(),con_person:$("#concernperson").val(),quot_req:$("#quotationreq").val(),selectremark:$("#addremark").val(),remark:$("#remark").val(),rowdata:rowdata},
				success: function(response){
					
				},
				complete:function(response){
				var response=response.responseText;
				console.log(response);
				if($.trim(response)=="success"){	
					$("#alertsuccess").show();
					setTimeout(function(){ if($("#quotationreq").val()=="Yes"){
						$("#modal-default").modal('show');
						$("#alertsuccess").hide();
					} else{
						$(location).attr('href','followuplist.php');		
					} }, 3000);		
				}
				else if($.trim(response)=="exist"){
					$("#alertexist").show();
					setTimeout(function(){ $("#alertexist").hide(); }, 3000);
				}
				else{
					$("#alerterror").show();
					setTimeout(function(){ $("#alerterror").hide(); }, 3000);
				}
			}
		});
	}
}
function confirm(){
	$("#modal-default2").modal('show');
	$("#modal-default").modal('hide');
}
function closeconfirm(){
	$(location).attr('href','followuplist.php');		
}

function visitetype(){
	$("#modal-default1").modal('show');
}
function visite(){
	$("#hiddenvisitetype").val($("#visitetype").val());
	$("#modal-default1").modal('hide');
	$("#hiddendiv").show();
	$("#hiddendiv1").show();
}
function companyname(){
		$.ajax({
			type:"POST",
			url:"getSessioncompany.php",
			data:{lead_id:"23",company:$("#company").val(),product_type:$("#producttype").val()},
			success:function(response){
				if($.trim(response)=="DataFound"){	
					$("#modal-default1").modal('hide');
					$("#modal-default").modal('hide');
					$("#modal-default2").modal('hide');
					$("#modal-default3").modal('show');
				}
				else{
					var id = "23";
					$(location).attr('href',"quotation.php?id="+id);				
				}
			},
		});
		$("#hiddencompany").val($("#company").val());
		$("#hiddenproducttype").val($("#producttype").val());
}
function repeatconfirm(){
	var lead_id = "23";
	var id = "23";
	$(location).attr('href',"quotationlist.php?id="+id+"&lead_id="+lead_id);
	$("#modal-default1").modal('hide');
	$("#modal-default").modal('hide');
	$("#modal-default2").modal('hide');
	$("#modal-default3").modal('hide');
}
function discard(){
	var id = "23";
	$.ajax({
		type:"POST",
		url:"disacrd.php",
			data:{lead_id:"23"},
			success:function(response){
			console.log(response);
			if($.trim(response)==""){	
				$(location).attr('href',"LeadList.php");	
			}
			else{
				alert("Error! Something Went wrong");	
			}
		}
	});
}
</script>