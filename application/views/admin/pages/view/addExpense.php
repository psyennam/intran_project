<section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
			  <h3 class="box-title">Expense Information</h3>
			</div>
			
          <!-- /.box-header -->
			<div class="box-body">
				<form method="post" enctype="multipart/form-data">		
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<label>Date<span style="color:red">*</span></label>
								<input type="date" id="date" name="date" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label>Type<span style="color:red">*</span></label>
								<select id="expense_type" name="expense_type" class="form-control" 
								onchange="gettype();">
									<option value=''>Select</option>
									<option value="1">In City</option>
									<option value="2">Out Of City</option>								
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Description<span style="color:red">*</span></label>
								<input type="text" id="description" name="description" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label>Amount<span style="color:red">*</span></label>
								<input type="text" id="amount" name="amount" class="form-control">
							</div>
						</div>
					</div>
					
					<div class="row" id="outofcity" style="display: none !important;">
						<div class="col-md-12">
							<div class="form-group col-md-3">
								<label>Expense For<span style="color:red">*</span></label>
								<select id="expense_for" name="expense_for" class="form-control">
									<option value=''>Select</option>
									<option value="bus">Bus</option>
									<option value="train">Train</option>
									<option value="car">Car</option>								
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Expense Image<span style="color:red">*</span></label>
								<input type="file" id="exp_pic" name="exp_pic" class="form-control">
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
	function gettype() 
	{
		if($("#expense_type").val()=="") 
		{
			$("#outofcity").hide();
			$("#amount").val("").attr("disabled",false);
		}
		else if($("#expense_type").val()=="1")
		{
			$("#outofcity").hide();
			$("#amount").val(100).attr("disabled",true);
		}
		else
		{
			$("#outofcity").show();
			$("#amount").val("").attr("disabled",false);
		}
	}	
	function formBack()
 	 {
    	parent.history.back();
    	return false;
  	}
</script>