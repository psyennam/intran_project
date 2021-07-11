<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo emp_name($this->session->userdata('emp_code'));?>(<?php echo $this->session->userdata('designation');?>)</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><?= __lang('MAIN NAVIGATION'); ?></li>
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span><?= __lang('Dashboard'); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span><?= __lang('Complaint'); ?></span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <?php if($this->session->userdata('designation')=="Chief Technician"||$this->session->userdata('designation')=="Service Technician") { ?>
              <li class="active"><a href="<?php echo base_url('Complaint/complaint_tracking');?>"><i class="fa fa-circle-o"></i><?= __lang('Complaint'); ?></a></li>
              <li class="active"><a href="<?php echo base_url('Complaint/close_tracking');?>"><i class="fa fa-circle-o"></i><?= __lang('Close'); ?></a></li>
              <?php }else{ ?>
              <li class="active"><a href="<?php echo base_url('Complaint/viewcomplaint');?>"><i class="fa fa-circle-o"></i><?= __lang('Complaint'); ?></a></li>
            <?php } ?>
            </ul>
          </li>
        <?php if($this->session->userdata('role')=="Employee" && $this->session->userdata('designation')=="Manager"){?>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span><?= __lang('Client'); ?></span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?php echo base_url('Client/client');?>"><i class="fa fa-circle-o"></i><?= __lang('Supplier'); ?></a></li>
              <li class="active"><a href="<?php echo base_url('Client/leadlist');?>"><i class="fa fa-circle-o"></i><?= __lang('Lead List'); ?></a></li>
              <li class="active"><a href="<?php echo base_url('Client/quotationlist');?>"><i class="fa fa-circle-o"></i><?= __lang('Quotation List'); ?></a></li>
             <li class="active"><a href="<?php echo base_url('Client/quotationcloselist');?>"><i class="fa fa-circle-o"></i><?= __lang('Quotation Close List'); ?></a></li>
              <li class="active"><a href="<?php echo base_url('Client/pendinglist');?>"><i class="fa fa-circle-o"></i><?= __lang('Pending Quotation List'); ?></a></li>  
              <li class="active"><a href="<?php echo base_url('Client/expenselist');?>"><i class="fa fa-circle-o"></i><?= __lang('Expense List'); ?></a></li>   
            </ul>
        </li>
        <?php }?>
      </ul>
  </section>
  <!-- /.sidebar -->
</aside>