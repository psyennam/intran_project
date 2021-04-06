<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <!-- Content Wrapper. Contains page content -->
  		<!-- Form Start  -->
        
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Country Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- Form Start  -->
        <form action="<?php echo base_url('Admin/countryinsert');?>" id="formone" class="form-group" method="post" enctype="multipart/form-data">   
              	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#mymodel">Add</button>
          		<!-- Modal Start  -->
              	<div class="modal fade" id="mymodel">
              		<div class="modal-dialog modal-dialog-centered">
              			<div class="modal-content">
              				<div class="modal-header">
              					<h3 class="text-center text-primary">Country</h3>	
              					<button type="button" class="close" data-dismiss="modal">&times;</button>	
              				</div>
              				<div class="modal-body">
                            <div class="row">
  							              <div class="col-sm-12 col-md-4 col-lg-4">
  							                <label>Country Name</label>
  							                <input type="text" class="form-control" placeholder="Enter Country Name" name="CountryName">
  							              </div>
  							              <div class="col-sm-12 col-md-12 col-lg-4">
  							                <label>Organization Id</label>
  							                <input type="text" class="form-control" name="ClientId" value="<?php echo $this->session->userdata('org_code');?>" disabled>
  							              </div>
  							            </div>
							       
              				</div>
              				<div class="modal-footer">
              					<div class="row">
							              <div class="col-md-12 text-center" style="margin-top: 10px;">
							               <button type="submit" class="btn btn-primary">Submit</button>
							              </div>
							    </div>
              				</div>
              			</div>
              		</div>
              	</div>
            	<!-- End Modal  -->
        </form>
         <!-- End Form Start  -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
					<th>Country Code</th>
					<th>Country Name</th>
					<th>Organization Code</th>
					<th>Created_at</th>
					<th>Status</th>
					<th>IpAddress</th>
					<th>Branch Code</th>
<!-- 					<th>Update</th>
					<th>Delete</th> -->
			    </tr>
                </thead>
               <tbody>
              <?php
	foreach ($countrydetails as $key) {
	?>
	<tr>
		<td><?php echo $key->id;?></td>
		<td><?php echo $key->country_code; ?></td>	
		<td><?php echo $key->country; ?></td>	
		<td><?php echo $key->org_code;?></td>	
		<td><?php echo $key->created_at; ?></td>	
		<td><?php echo $key->status; ?></td>	
		<td><?php echo $key->ip_address; ?></td>	
		<td><?php echo $key->branch_code; ?></td>	
		<!-- <td><a href="updaterole?id=<?php echo $key->role_code;?>"><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#updatemodel">UPDATE</button></a></td>
		<td><a href="deleterole?id=<?php echo $key->role_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>	 -->				
	</tr>	
	<?php
	}
		?>            
      </tbody>
      <tfoot>
      <tr>
					<th>ID</th>
					<th>Country Code</th>
					<th>Country Name</th>
					<th>Organization Code</th>
					<th>Created_at</th>
					<th>Status</th>
					<th>IpAddress</th>
					<th>Branch Code</th>
			<!-- 		<th>Update</th>
					<th>Delete</th> -->
			    </tr>
                </tfoot>
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
    <!-- /.content -->

  <!-- /.content-wrapper -->

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>	
