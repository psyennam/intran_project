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
								<label>Select Zone<span style="color:red">*</span></label>
                    			<select class="form-control zone" name="zone">
                      			<option value=""> --- </option>
                      			<?php foreach($zone as $k){
                        		echo '<option value="'.$k->code.'">'.$k->zone.'</option>';
                      			}?>
                   				 </select>
							</div>
							<div class="form-group col-md-3">
								<label>Select Sub-Zone</label>
                    			<select class="form-control subzone" id="optzone" name="optzone"></select>
							</div>
							<div class="form-group col-md-3">
								<label>City</label>
								<select class="form-control subcity" id="optcity" name="optcity">
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Pincode</label>
								<select class="form-control subpin" id="optpin" name="optpin">
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<label>Supplier Name<span style="color:red">*</span></label>
								<select class="form-control" id="optsupplier" name="supplier"></select>
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
								<input type="submit" class="btn btn-primary" value="Submit" id="btnSubmit">
								 <a href="#!" onclick="formBack();" class="btn btn-default btn-flat" style="margin-top: 8px;margin-right: 15px;">Back</a>
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

function formBack()
  {
    parent.history.back();
    return false;
  }
/* Zone dependent combo */
  $(document).ready(function(){
    $('.zone').change(function(){
      var zone_code = $(this).val();
      alert(zone_code);
      if(zone_code != "")
      {
        $.post(base_url+"/Admin/opt_zone/"+zone_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.zone+'</option>';
            });
            $('#optzone').html(html);
          }
        })

      }
    });

    $('.open_zone_modal').click(function(){
      $('#zonecode').val($(this).data('zonecode'));
      $('#submodel').modal('toggle');
    })
  })

  /* City dependent combo */
  $(document).ready(function(){
    $('.subzone').change(function(){
      var sub_code = $(this).val();
      alert(sub_code);
      if(sub_code!="")
      {
        $.post(base_url+"/Admin/sub_city/"+sub_code,function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.city+'</option>';
            });
            $('#optcity').html(html);
          }
        })

      }
    });

    $('.open_zone_modal').click(function(){
      $('#zonecode').val($(this).data('zonecode'));
      $('#submodel').modal('toggle');
    })
  })
  /* Pincode dependent combo */
  $(document).ready(function(){
    $('.subcity').change(function(){
      var city_code = $(this).val();
      alert(city_code);
      if(city_code!="")
      {
        $.post(base_url+"/Admin/opt_pincode/"+city_code,function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.code+'</option>';
            });
            $('#optpin').html(html);
          }
        })

      }
    });

    $('.open_zone_modal').click(function(){
      $('#zonecode').val($(this).data('zonecode'));
      $('#submodel').modal('toggle');
    })
  })
  /* Supplier dependent combo */
  $(document).ready(function(){
    $('.subpin').change(function(){
      var pin_code = $(this).val();
      alert(pin_code);
      if(pin_code!="")
      {
        $.post(base_url+"/Admin/opt_supplier/"+pin_code,function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.client+'</option>';
            });
            $('#optsupplier').html(html);
          }
        })

      }
    });

    $('.open_zone_modal').click(function(){
      $('#zonecode').val($(this).data('zonecode'));
      $('#submodel').modal('toggle');
    })
  })
</script>
<!-- SELECT c.city_code,c.city FROM tbl_client cl,tbl_city c WHERE cl.city_code=c.city_code and cl.zone_code='7ULwkV' -->

