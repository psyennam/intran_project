<section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
			  <h3 class="box-title">Product Information</h3>
			</div>
			
          <!-- /.box-header -->
			<div class="box-body">
				<form method="post" enctype="multipart/form-data">		
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<label>Company</label>
								<select id="company" name="company" class="form-control">
									<option value="1">Dent Master</option>
									<option value="2">Equip Master</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Product Type</label>
								<select id="producttype" name="producttype" class="form-control">
									<option value="1">Machinery Part</option>
									<option value="2">Spare Part</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Name<span style="color:red">*</span></label>
								<input type="text" class="form-control" name="name" id="name">
							</div>
							<div class="form-group col-md-3">
								<label>Product Code<span style="color:red">*</span></label>
								<input type="text" id="code" name="productcode" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<label>Description<span style="color:red">*</span></label>
								<textarea id="description" name="description" class="form-control"></textarea>
							</div>
							<div class="form-group col-md-3">
								<label>Price<span style="color:red;">*</span></label>
								<input type="text" id="customerprice" name="customerprice" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label>Distributor Price<span style="color:red;">*</span></label>
								<input type="text" id="distributorprice" name="distributorprice" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label>HSNCode</label>
								<input type="text" id="hsncode" name="hsncode" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<label>Weight</label>
								<input type="text" id="weight" name="weight" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label>GST</label>
								<input type="text" id="tax" name="tax" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label>Information</label>
								<textarea id="information" name="information" class="form-control"></textarea>
							</div>
							<div class="form-group col-md-3">
								<label>Product Image</label>
								<input type="file" id="proimage" name="proimage" class="form-control">
								<a href="#" data-toggle="modal" data-target="#modal-default"><i class="fa fa-eye"></i></a>
								<div id="myimage" style="display:none;"></div>
							</div>
							<div class="form-group col-md-3">
								<label>Product Document</label>
								<input type="file" id="procatg" name="procatg" class="form-control" accept="application/pdf" />
							<!--	<a href="#" data-toggle="modal" data-target="#modal-default1"><i class="fa fa-eye"></i></a>
								<div id="myimage1" style="display:none;"></div>-->
							</div>
						</div>
						<div class="col-md-12">
							<div class="box-header with-border">
								<h3 class="box-title">Approved Price</h3>
							</div>
						</div>
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="sample_data" class="table table-bordered table-striped" width="100%">
									<thead>
										<tr>
											<th class="span2" width="10%">Option</th>
											<th>Company Name</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody id="product_table_body">
										<tr>
											<td style="text-align:center !important;"><a href="javascript:void(0);" class="addCF"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
											<td><input type="text" id="c_name0" name="c_name[]"></td>
											<td><input type="text" id="c_price0" name="c_price[]"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<input type="submit" class="btn btn-primary" value="Submit" id="btnSubmit" onclick="formsubmit();">
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
				</form>
			</div>
			<div class="modal fade" id="modal-default">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Selected Image</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-2">
									</div>
									<div class="col-md-8">
										<img id="blah" src="#" alt="your image" style="width:400px;height:400px;"/>
									</div>
									<div class="col-md-2">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
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
							<h4 class="modal-title">Selected Catalogue</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-2">
									</div>
									<div class="col-md-8">
										<img id="blah1" src="#" alt="your image" style="width:400px;height:400px;"/>
									</div>
									<div class="col-md-2">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
<script>
$("#procatg").change(function() {
  readURL1(this);
});
var count=0;
var totalrows=0;
$(".addCF").click(function(){
	count++;
	totalrows++;
	$("#product_table_body").append('<tr id="newrow"><td style="text-align:center !important;"><span class="xyza'+count+'"></span></td><td><input type="text" id="c_name'+count+'"></td><td><input type="text" id="c_price'+count+'"></td></tr>');
	
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

</script>