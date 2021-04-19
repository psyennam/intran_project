<?php if(!empty($error)) echo $error; ?>

<section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
			  <h3 class="box-title"><!-- <?= __lang('productinformation')?> -->Product Information</h3>
			</div>
			
          <!-- /.box-header -->
			<div class="box-body">
				<form method="post" enctype="multipart/form-data">		
					<div class="row">
						<div class="col-md-12">
							<div class="col-sm-12 col-md-4 col-lg-3">
			                    <label><!-- <?= __lang('selectcompany')?> -->Select Company</label>
		                    	<select class="form-control state" name="companycombo">
		                      		<option value=""> --- </option>
		                      		<?php foreach($companydetails as $k){
		                        		echo '<option value="'.$k->company_code.'">'.$k->company.'</option>';
		                      		}?>
		                    	</select>
                  			</div>
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('producttype')?> -->Product Type</label>
                				<select class="form-control" id="optcity" name="producttype">
                				</select>
							</div>
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('name')?> -->Name<span style="color:red">*</span></label>
								<input type="text" class="form-control" name="name" id="name">
							</div>
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('productcode')?> -->Product Code<span style="color:red">*</span></label>
								<input type="text" id="code" name="productcode" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('description')?> -->Description<span style="color:red">*</span></label>
								<textarea id="description" name="description" class="form-control"></textarea>
							</div>
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('price')?> -->Price<span style="color:red;">*</span></label>
								<input type="text" id="customerprice" name="customerprice" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('distributorprice')?> -->Distributor Price<span style="color:red;">*</span></label>
								<input type="text" id="distributorprice" name="distributorprice" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('hsncode')?> -->HSNCode</label>
								<input type="text" id="hsncode" name="hsncode" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('weight')?> -->Weight</label>
								<input type="text" id="weight" name="weight" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('gst')?> -->GST</label>
								<input type="text" id="tax" name="tax" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('information')?> -->Information</label>
								<textarea id="information" name="information" class="form-control"></textarea>
							</div>
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('productimage')?> -->Product Image</label>
								<input type="file" multiple id="proimage" name="proimage[]" class="form-control">
								<a href="#" data-toggle="modal" data-target="#modal-default"><i class="fa fa-eye"></i></a>
								<div id="myimage" style="display:none;"></div>
							</div>
							<div class="form-group col-md-3">
								<label><!-- <?= __lang('productdocument')?> -->Product Document</label>
								<input type="file" id="procatg" name="procatg[]" class="form-control" accept="application/pdf" multiple />
							<!--	<a href="#" data-toggle="modal" data-target="#modal-default1"><i class="fa fa-eye"></i></a>
								<div id="myimage1" style="display:none;"></div>-->
							</div>
						</div>
						<div class="col-md-12">
							<div class="box-header with-border">
								<h3 class="box-title"><!-- <?= __lang('approvedprice')?> -->Approved Price</h3>
							</div>
						</div>
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="sample_data" class="table table-bordered table-striped" width="100%">
									<thead>
										<tr>
											<th class="span2" width="10%"><!-- <?= __lang('option')?> -->Option</th>
											<th><!-- <?= __lang('companyname')?> -->Company Name</th>
											<th><!-- <?= __lang('companyprice')?> -->Price</th>
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
	$("#product_table_body").append('<tr id="newrow"><td style="text-align:center !important;"><span class="xyza'+count+'"></span></td><td><input type="text" name="c_name[]" id="c_name'+count+'"></td><td><input type="text" name="c_price[]" id="c_price'+count+'"></td></tr>');
	
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

  $(document).ready(function(){
    $('.state').change(function(){
      var state_code = $(this).val();
      if(state_code != "")
      {
        $.post(base_url+"/admin/opt_producttype/"+state_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value=""> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.id+'">'+value.product_type+'</option>';
            });
            $('#optcity').html(html);
          }
        })
      }
    });
  })

</script>