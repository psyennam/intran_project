 <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Oraganisation Data
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
              <h3 class="box-title">Oraganisation Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
					<th>Organisation Id</th>
					<th>Client Name</th>
					<th>Address</th>
					<th>PersonName</th>
					<th>PersonEmailId</th>
					<th>PersonMobileNo</th>
					<th>PersonEmergencyNo</th>
					<th>NoOfBranches</th>
					<th>Status</th>
					<th>RegistrationDate</th>
					<th>ValidityDate</th>
					<th>Logo</th>
					<th>Url</th>
					<th>CreatedTime</th>
					<th>IpAddress</th>
					<th>Update</th>
					<th>Delete</th>
			    </tr>
                </thead>
                <tbody>
              <?php
	foreach ($orgdetails as $key) {
	?>
	<tr>
		<td><?php echo $key->id; ?></td>
		<td><?php echo $key->org_code; ?></td>	
		<td><?php echo $key->org_name; ?></td>	
		<td><?php echo $key->address;?></td>	
		<td><?php echo $key->client_name; ?></td>	
		<td><?php echo $key->client_email; ?></td>	
		<td><?php echo $key->client_mobileno; ?></td>	
		<td><?php echo $key->emergency_contact; ?></td>	
		<td><?php echo $key->no_branch; ?></td>	
		<td><span class="label label-success"><?php echo $key->status;?></span></td>
		<td><?php echo $key->regdate;?></td>	
		<td><?php echo $key->validity;?></td>
		<td><img src="<?php echo $key->logo;?>" height="100px" width="100px"></td>
		<td><?php echo $key->url; ?></td>	
		<td><?php echo $key->created_at; ?></td>
		<td><?php echo $key->ip_address; ?></td>	
		<td><a href="updatedata?org_code=<?php echo $key->org_code;?>"><button type="button" class="btn btn-block btn-primary">UPDATE</button></a></td>
		<td><a href="deletedata?org_code=<?php echo $key->org_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>					
	</tr>	
	<?php
	}
		?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
					<th>Organisation Id</th>
					<th>Client Name</th>
					<th>Address</th>
					<th>PersonName</th>
					<th>PersonEmailId</th>
					<th>PersonMobileNo</th>
					<th>PersonEmergencyNo</th>
					<th>NoOfBranches</th>
					<th>Status</th>
					<th>RegistrationDate</th>
					<th>ValidityDate</th>
					<th>Logo</th>
					<th>Url</th>
					<th>CreatedTime</th>
					<th>IpAddress</th>
					<th>Update</th>
					<th>Delete</th>
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
