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
												<label>Product Name</label>
												<select class="form-control" id="productname" onchange="myfunction2();">	
												</select>
											</div>
											<div class="col-md-3 form-group">	
												<label>Quantity</label>
												<input type="text" id="qty" class="form-control" onkeyup="gethiddenamt();">
											</div>
											<div class="col-md-3 form-group">	
												<label>Price</label>
												<input type="text" id="price" class="form-control" disabled>
											</div>
											<div class="col-md-3 form-group">	
												<label>Approved Price List</label>
												<select id="approvedprice" class="form-control" onchange="getrate();">
													<option value=''>Select</option>
													<option value='1'>GYS-20000</option>
													<option value='2'>SIDDHAPURA-21000</option>
													<option value='3'>PLAIN-19000</option><option value='4'>Riland-55000</option><option value='5'>Epic-100000</option><option value='6'>Arcraft Plasma Equipments-280000</option><option value='7'>Sai Weld India-150000</option><option value='8'>Sparkweld Eng-43000</option><option value='9'>Canfab Welders-250500</option><option value='10'>Rajlaxmi-10000</option><option value='11'>AB-10000</option><option value='12'>XY-9000</option><option value='13'>-</option><option value='14'>Valeo-18000</option><option value='15'>Behr-16000</option><option value='16'>-</option><option value='17'>-</option><option value='18'>-</option><option value='19'>Toyota-500000</option><option value='20'>Hyundai-475000</option><option value='21'>Maruti-435000</option><option value='22'>Kia-495000</option><option value='23'>Maruti-88000</option><option value='24'>MSIL-2700</option><option value='25'>TKM-2675</option><option value='26'>HMIL-2750</option><option value='27'>MSIL-90000</option><option value='28'>TKM-100000</option><option value='29'>HMIL-100000</option><option value='30'>RENAULT-90000</option><option value='31'>FORD-90000</option>													</select>
											</div>
											<div class="col-md-3 form-group">	
												<label>Rate</label>
												<input type="text" id="rate" class="form-control">
											</div>
											<div class="col-md-3 form-group">	
												<label>Discount Type</label>
												<select id="discounttype" class="form-control" onchange="gethiddenamt();">
													<option value="">Select</option>
													<option value="amount">In Amount</option>
													<option value="percent">In Percent</option>
												</select>
											</div>
											<div class="col-md-3 form-group">	
												<label>Discount</label>
												<input type="text" id="discount" class="form-control" onkeyup="gethiddenamt()" readonly><span id="hiddenvalueamt" class="pull-right" style="color:red;">
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
