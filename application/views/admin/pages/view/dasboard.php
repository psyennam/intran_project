<section class="content">
  <?php if($this->session->userdata('designation')=='Manager') {?>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="ion ion-person-add"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL Complaints</span>
          <span class="info-box-number"><?php echo totalcomplaint($this->session->userdata('emp_code'));?></span>  
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="ion ion-person-add"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">NEW Complaints</span>
          <span class="info-box-number"><?php echo newcomplaint();?></span>  
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-bag"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">PENDING COMPLAINTS</span>
          <span class="info-box-number"><?php echo pendingcomplaints($this->session->userdata('emp_code'));?></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
       <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL QUOTATION</span>
          <span class="info-box-number"><?php echo totalquotations($this->session->userdata('emp_code'));?></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">PENDING QUOTATION</span>
            <span class="info-box-number"><?php echo pendingquotations($this->session->userdata('emp_code'));?></span> 
        </div>
      </div>
    </div>
  </div>

  <?php } else if($this->session->userdata('role')==='Admin'){?>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="ion ion-person-add"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL VISIT</span>
          <span class="info-box-number"><?php echo totalvisit();?></span>  
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-bag"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TODAY VISIT</span>
          <span class="info-box-number"><?php echo todayvisit();?></span></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
       <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Sales</span>
          <span class="info-box-number"><?php echo totalsales();?></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL EXPENSE</span>
          <span class="info-box-number"><?php echo totalexpense();?></span> 
        </div>
      </div>
    </div>
  </div>

    <!-- sales manager dashboard code will change according their functionality (It is just a copy pasted code od manager)-->
  
  <?php } else if($this->session->userdata('designation')==('Sales Manager')) {?>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="ion ion-person-add"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL Complaints</span>
          <span class="info-box-number"><?php echo totalcomplaint($this->session->userdata('emp_code'));?></span>  
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-bag"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">PENDING COMPLAINTS</span>
          <span class="info-box-number"><?php echo pendingcomplaints($this->session->userdata('emp_code'));?></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
       <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL QUOTATION</span>
          <span class="info-box-number"><?php echo totalquotations($this->session->userdata('emp_code'));?></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">PENDING QUOTATION</span>
            <span class="info-box-number"><?php echo pendingquotations($this->session->userdata('emp_code'));?></span> 
        </div>
      </div>
    </div>
  </div>

   <?php } else if($this->session->userdata('designation')=='Chief Technician ') {?>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="ion ion-person-add"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL Complaints</span>
          <span class="info-box-number"><?php echo totalcomplaint($this->session->userdata('emp_code'));?></span>  
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-bag"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TODAY COMPLAINTS</span>
          <span class="info-box-number"><?php echo todaycomplaints($this->session->userdata('emp_code'));?></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
       <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">PENDING COMPLAINTS</span>
          <span class="info-box-number"><?php echo pendingTechComplaints($this->session->userdata('emp_code'));?></span>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</section>