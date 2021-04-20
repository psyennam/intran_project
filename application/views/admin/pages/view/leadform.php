<section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
			  <h3 class="box-title">Lead Information</h3>
			</div>
			
          <!-- /.box-header -->
			<div class="box-body">
				<form method="post" enctype="multipart/form-data">		
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<label>Pincode<span style="color:red">*</span></label>
								<select id="pincode" name="pincode" class="form-control" onchange="getDealer();">
									<option value=''>Select</option>
									<option value='1'>400099</option>
									<option value='2'>400609</option>
									<option value='3'>400808</option>
									<option value='4'>400095</option>	
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Dealership Name<span style="color:red">*</span></label>
								<select id="name" name="name" class="form-control" onchange="getAllData();">
									<option value=''>Select</option>
									<option value='ABC'>ABC</option>
									<option value='PQR'>PQR</option>
									<option value='XYZ'>XYZ</option>
									<option value='PSS'>PSS</option>							
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Brand<span style="color:red">*</span></label>
								<select id="brand" name="brand" class="form-control">
									<option value=''>Select</option>
									<option value='1'>Lincoln Electric</option>
									<option value='2'>AMADA WELD TECH</option>
									<option value='3'>CEBORA</option>		
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>State</label>
								<select id="state" class="form-control select2" data-show-subtext="true" data-live-search="true">
									<option value=''>Select</option>
									<option value='1'>Maharashtra</option>
									<option value='2'>Tamil Nadu</option>
									<option value='3'>Gujarat</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<label>Company Name</label>
								<input type="text" id="company_name" name="company_name" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label>GST</label>
								<input type="text" id="gst" name="gst" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label>Address<span style="color:red">*</span></label>
								<textarea id="address" name="address" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="box-header with-border">
						<h3 class="box-title">Contact Person</h3>
					</div>
					<div class="row">
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
												<td><input type="text" id="cp_name0" name="cp_name"></td>
												<td><input type="text" id="cp_designation0" name="cp_designation"></td>
												<td><input type="text" id="cp_mobile0" name="cp_mobile"></td>
												<td><input type="text" id="cp_email0" name="cp_email"></td>
											</tr>
										</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-4">
								<input type="submit" class="btn btn-primary" value="Submit" id="btnSubmit" onclick="formsubmit();">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
</section>
<script>
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
	$('#product_table_body tr:last').remove();
});

</script>