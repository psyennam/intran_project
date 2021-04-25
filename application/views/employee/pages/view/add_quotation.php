<input type="hidden" id="hiddenprice">
	<section class="content">
        <div class="box box-default">
			<div class="row">
				<div class="col-md-12">
					<div class="box-header with-border">
						<div class="box-body">
							<div class="row">
								<!-- Div For Product Description Table Start -->
									<div class="row">
										<div class="col-sm-12 form-group">
											<div class="box-header with-border">
												<h3 class="box-title">Add Quotation</h3>
											</div>
										</div>
										<div class="col-sm-12" id="productdiv">
											<div class="col-md-3 form-group">	
												<label>Company Name</label>
												<select class="form-control companyname" id="companyname" name="companyname">
													<option value="">---</option>
												<?php foreach ($companydetails as $key) {?>
													<option value="<?= $key->company_code; ?>"><?= $key->company;?></option>	
												<?php } ?>
												</select>
											</div>
											<div class="col-md-3 form-group">	
												<label>Product Type</label>
												<select class="form-control producttype" id="opt_producttype" name="producttype">	
												</select>
											</div>

											<div class="col-md-3 form-group">	
												<label>Product Name</label>
												<select class="form-control productname" id="opt_productname" name="productname">	
												</select>
											</div>
											<div class="col-md-3 form-group">	
												<label>Quantity</label>
												<input type="text" id="qty" class="form-control" onkeyup="get_amount();">
											</div>
											<div class="col-md-3 form-group">	
												<label>Price</label>
												<input type="text" id="opt_productprice" name="Productprice" class="form-control" disabled>
											</div>
											<div class="col-md-3 form-group">	
												<label>Approved Price List</label>
												<select id="opt_approvedprice" class="form-control approvedprice">				
												</select>
											</div>
											<div class="col-md-3 form-group">	
												<label>Rate</label>
												<input type="text" id="rate" class="form-control">
											</div>
											<div class="col-md-3 form-group">	
												<label>Discount Type</label>
												<select id="discounttype" class="form-control discounttype" onchange="discount_type();">
													<option value="">Select</option>
													<option value="amount">In Amount</option>
													<option value="percent">In Percent</option>
												</select>
											</div>
											<div class="col-md-3 form-group">	
												<label>Discount</label>
												<input type="text" id="discount" class="form-control" onkeyup="get_calculation()" readonly><span id="hiddenvalueamt" class="pull-right" style="color:red;">
											</div>
											<div class="col-md-3 form-group">	
												<label>Total</label>
												<input type="text" id="total" class="form-control" readonly>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="alert alert-warning alert-dismissible" id="alertzero" style="display:none !important;">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<h4>Total less than zero</h4>
											</div>
										</div>
									</div>
									<div class="col-sm-12" id="productdivs">
										<input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" onclick="formSubmit();">
										<input type="submit" id="btnView" class="btn btn-primary" value="View" onclick="formView();">
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
										<div class="alert alert-warning alert-dismissible" id="alertcompany" style="display:none !important;">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4>Please Select Company</h4>
										</div>
										<div class="alert alert-warning alert-dismissible" id="alertproduct" style="display:none !important;">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4>Please Select Product</h4>
										</div>
										<div class="alert alert-warning alert-dismissible" id="alertquantity" style="display:none !important;">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4>Please Enter Quantity</h4>
										</div>
										<div class="alert alert-warning alert-dismissible" id="alertrate" style="display:none !important;">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4>Please Enter Rate</h4>
										</div>
										<div class="alert alert-warning alert-dismissible" id="alertcnt" style="display:none !important;">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4>This Product Is Already Added</h4>
										</div>
										
									</div>
									<!-- Div For Product Description Table End -->
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript">
/* ProductType dependent combo */
  $(document).ready(function(){
    $('.companyname').change(function(){
      var company_code = $(this).val();
      // alert(company_code);
      if(company_code != "")
      {

        $.post(base_url+"/Client/opt_producttype/"+company_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.product_type+'</option>';
            });
            $('#opt_producttype').html(html);
          }
        })

      }
    });
  })
  /* ProductName dependent combo */
  $(document).ready(function(){
    $('.producttype').change(function(){
      var producttype_code = $(this).val();
      // alert(producttype_code);
      if(producttype_code != "")
      {

        $.post(base_url+"/Client/opt_productname/"+producttype_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.product+'</option>';
                
            });
            $('#opt_productname').html(html);
          }
        })

      }
    });
  })

    /* Price box */
  $(document).ready(function(){
    $('.productname').change(function(){
      var product_code = $(this).val();
      // alert(product_code);
      if(product_code != "")
      {
        $.post(base_url+"/Client/opt_price/"+product_code, function(res){
          res = $.parseJSON(res);
          var html;
          if(res.status == 200){
            $.each(res.data, function(index,value){
            	$('#opt_productprice').val(value.price); 
            	$('#total').val(value.price);   
            });
          }
        })

      }
    });
  })
  /* ApprovedPrice dependent combo */
  $(document).ready(function(){
    $('.productname').change(function(){
      var product_code = $(this).val();
      // alert(product_code);
      if(product_code != "")
      {
        $.post(base_url+"/Client/opt_approvedprice/"+product_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.price+'">'+value.code+'-'+value.price+'</option>';
            });
            $('#opt_approvedprice').html(html);

          }
        })

      }
    });
  })
   /* Rate box */
  $(document).ready(function(){
    $('.approvedprice').change(function(){
      var approvedprice= $(this).val();
      // alert(approvedprice);
      if(approvedprice != "")
      {
        $('#rate').val(approvedprice);
        $('#total').val(approvedprice); 
      }
    });
  })

function discount_type(){
	var discounttype=$('#discounttype').val();
	// alert(discounttype);
	if (discounttype!="") 
	{
		$("#discount").attr("readonly",false);
	}
	else
	{
		$("#discount").attr("readonly", true);
	}
}

function get_amount()
{	
	var qty=$("#qty").val();
	var approved_price=$(".approvedprice").val();
	$('#total').val(qty*approved_price);	
}

function get_calculation()
{
	var discount=$("#discount").val();
	var total=$("#total").val();
	// alert(total);
	if($("#discounttype").val()=="amount")
	{
		$("#total").val(total-discount);
	}
}

</script>