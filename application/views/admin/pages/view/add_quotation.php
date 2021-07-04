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
										<form method="post">
                      <input type="hidden" name="qcode" value="<?= (isset($qcode))?$qcode:''; ?>">
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
													<input type="text" id="qty" name="qty" class="form-control" onkeyup="get_amount();">
												</div>
												<div class="col-md-3 form-group">	
													<label>Price</label>
													<input type="text" id="opt_productprice" name="Productprice" class="form-control" readonly>
												</div>
												<div class="col-md-3 form-group">	
													<label>Approved Price List</label>
													<select id="opt_approvedprice" name="approvedprice" class="form-control approvedprice">				
													</select>
												</div>
												<div class="col-md-3 form-group">	
													<label>Rate</label>
													<input type="text" id="rate" class="form-control" name="rate">
												</div>
												<div class="col-md-3 form-group">	
													<label>Discount Type</label>
													<select id="discounttype" name="discounttype" class="form-control discounttype" onchange="discount_type();">
														<option value="">Select</option>
														<option value="amount">In Amount</option>
														<option value="percent">In Percent</option>
													</select>
												</div>
												<div class="col-md-3 form-group">	
													<label>Discount</label>
													<input type="text" id="discount" name="discount" class="form-control" onkeyup="get_calculation()" readonly><span id="hiddenvalueamt" class="pull-right" style="color:red;">
												</div>
												<div class="col-md-3 form-group">	
													<label>Total</label>
													<input type="text" id="total" name="total" class="form-control" readonly>
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
											<input type="submit" id="btnNext" name="btnNext" class="btn btn-primary" value="ADD More">
										</div>
									</form>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>

	
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="col-md-12">
            <div class="box-header with-border" style="text-align:center;">
              <h3 class="box-title" style="font-size:25px !important;">Panding Quotation List</h3>
            </div>
            <!-- <a href="#!" onclick="formBack();" class="btn btn-default btn-flat" style="margin-top: 8px;margin-right: 15px;">Back</a> -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                
                <th>Product Type</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Approved Price Lis</th>
                <th>Rate</th>
                <th>Discount Type</th>
                <th>Discount</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
             <?php foreach ($panding_quotationlist as $key) { ?>
              <tr>
                <td><?= $key->lead_code; ?></td>
                <td><?= $key->product_code; ?></td>
                <td><?= $key->quantity; ?></td>
                <td><?= $key->price; ?></td>
                <td><?= $key->approved_price; ?></td>
                <td><?= $key->rate; ?></td>
                <td><?= $key->discount_type; ?></td>
                <td><?= $key->discount; ?></td>
                <td><?= $key->total; ?></td>               
              </tr>
              <?php } ?>
              </tbody>
              <a href="<?php if(isset($qcode)){ echo base_url('Client/quotationconfirm/'.$qcode);}else {echo base_url('Client/quotationconfirm');} ?>"><button class="btn btn-primary" type="button" name="btnConfirm" id="btnConfirm">Confirm</button></a>
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

	<script type="text/javascript">

	$('#hiddenvalueamt').html(0);

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
      var Quantity=$("#qty").val();
      // alert(approvedprice);
      if(approvedprice != "")
      {
        $('#rate').val(approvedprice);
        $('#total').val(approvedprice*Quantity); 
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
	// var total=$("#total").val();
	var qty=$("#qty").val();
	var rate=$("#rate").val();
	var discount=$("#discount").val();
	

	if($("#discounttype").val()=="amount")
	{
		if($("#discount").val() !="")
		{
			$("#total").val((qty*rate)-discount);
		}
		else{
			$('#total').val(qty*rate);
		}
		$('#hiddenvalueamt').html(discount);
	}
	if($("#discounttype").val() =="percent")
	{
		var per=((qty*rate)*discount)/100;
		if($("#discount").val() !="")
		{
			$("#total").val((qty*rate)-per);
		}
		else{
			$('#total').val(qty*rate);
		}
		$('#hiddenvalueamt').html(per);
	}
}

</script>