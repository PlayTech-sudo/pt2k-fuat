<?php
	session_start();	
	$title = "Edit Stock";
	$acc_code = "A01";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-md-12">
	    	<div class="col-md-6 ml-auto mr-auto">
	    		<div class="card">
					  <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">contacts</i>
              </div>
              <h4 class="card-title">Edit Stock</h4>
          	</div>
					  <div class="card-body">
				    	<?php
				    		if(isset($_GET['editstock'])) {
				    			$res = getDataById($conn, "stock", $_GET['editstock']);
								$row = mysqli_fetch_array($res);
							?>
							<form name="form2" action="process/admin/usr_process.php" method="POST">
		        		<div class="form-group bmd-form-group">
		                	<label class="bmd-label-floating">Qty</label>
		                	<input type="text" class="form-control" name="qty" value="<?php echo $row['qty']; ?>" autofocus="">
	            	   </div>
	            	   <div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Gas</label>
	                	<input type="text" class="form-control" value="<?php echo $row['gtype']; ?>" name="gtype">
	            	</div>
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Price</label>
	                	<input type="text" class="form-control" value="<?php echo $row['price']; ?>" name="price">
	            	</div>
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">note</label>
	                	<input type="text" class="form-control" value="<?php echo $row['note']; ?>" name="note">
	            	</div>
	            	
	            	
	            	
	            	<div class="row">
	              	<div class="col-md-12">
	              		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	                		<button class="btn btn-success" name="editstock" type="submit">Update</button>
	                		<a class="btn btn-danger" href="sstockup.php">Cancel</a>
	              	</div>
	            	</div>
	     				</form>
			     		<?php
			     			}
			     		?>
			     	</div>
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