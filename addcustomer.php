<?php
	session_start();
	
	$title = "Customer";
	$acc_code = "A08";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
	require "functions/general.php";	 

	
	if(isset($_POST['addcustomer'])){
	
		$cname=$_POST['cname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$ctype = $_POST['ctype'];
		

		$sl = getsl($conn, "id", "addcustomer");
		$sql = mysqli_query($conn,"INSERT INTO `addcustomer` (id,cname,phone,email,ctype) VALUES('".$sl."','".$cname."', '".$phone."','".$email."','".$ctype."')") or die("cannot insert".mysqli_error($conn));

		
		

	}
?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md-4">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
				  	<div class="card-icon">
				    	<i class="material-icons">person_add</i>
				    </div>
				    <h4 class="card-title">Customer registration</h4>
					</div>
			  	<div class="card-body">
			  		<form name="form2" action="" method="POST">
			  			
	
				      
				        <div class="col-md-12">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">customer name</label>
				              <input type="text" class="form-control" required="" name="cname">
				            </div>
				        </div>
                       <div class="row">
                       <div class="col-md-6">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">phone</label>
				              <input type="text" class="form-control" required="" name="phone">
				            </div>
				        </div>
			      	

				         
				        <div class="col-md-6">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">email</label>
				              <input type="text" class="form-control" required="" name="email">
				            </div>
				        </div>
			      	</div>
			      	<div class="row">
				       <!-- <div class="col-md-12">
				          <div class="form-group bmd-form-group">
				            <label class="bmd-label-floating">customer type</label>
				            <input type="text" class="form-control" required="" name="ctype">
				          </div>
				        </div>-->
				        <div class="col-md-12">
				        	<div class="form-group bmd-form-group">
				        		<div class="dropdown bootstrap-select">
				        			<select class="selectpicker" data-style="select-with-transition" required="" title="customer_type" data-size="7" tabindex="-98" name="ctype">
				        				<option>employee</option>
				        				<option>fleet</option>
				        			</select>
				        		</div>
				        	</div>
				        </div>

				      </div>
			      	<button type="submit" name="addcustomer" class="btn btn-success">Submit</button>
			      	<button type="reset" class="btn btn-danger float-right">Clear</button>
			      	
			      	<div class="clearfix"></div>
			  		</form>
			  	</div>
			  </div>
			  <div class="text-center">
						      	<button class="btn btn-info float-center" onclick="window.location.href = 'addtransaction.php';">transaction entry</button> </div>
	    </div>
	    
						      	
	    <div class="col-md-8">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
				  	<div class="card-icon">
				    	<i class="material-icons">person_add</i>
				    </div>
				    <h4 class="card-title">customer information</h4>
					</div>
			  	<div class="card-body">
			    	<table class="table">
								        		<thead>
								          			<tr>
											            <th class="text-center">Customer id</th>
											            
											             <th>Customer name</th>
											            <th>phone</th>
											            <th>email</th>
											            <th>customer type</th>
											            <th>Edit</th>
											          
								          			</tr>
								        		</thead>
								        		<tbody>
								        			<?php
								        				$res = getData($conn, "addcustomer");
								        				foreach ($res as $user) {
								        			?>
									          		<tr>
											            <td class="text-center"><?php echo $user['id']; ?></td>
											            <td><?php echo $user['cname']; ?></td>
											            <td><?php echo $user['phone']; ?></td>
											            <td><?php echo $user['email']; ?></td>
											            <td><?php echo $user['ctype']; ?></td>
											            <td class="text-center td-actions">
												            <a rel="tooltip" href="edit_customer.php?editcustomer=<?php echo $user['id']; ?>" class="btn btn-success btn-link" title="Edit">
												              <i class="material-icons">edit</i>
												            </a>
												            
												            <a rel="tooltip" href="process/admin/usr_process.php?delcustomer=<?php echo $user['id']; ?>" class="btn btn-danger btn-link" title="Delete">
												              <i class="material-icons">close</i>
												            </a>
											            </td>
									          		</tr>
									          		<?php
									          			}
									          		?>
								        		</tbody>
			    	</table>
			    </div>
			  </div>
	    </div>
	  </div>              
	</div>
</div>
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	
?>