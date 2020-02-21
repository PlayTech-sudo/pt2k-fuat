<?php
	session_start();	
	$title = "Edit Transactions";
	$acc_code = "A08";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
?>
<!-- MAIN CONTENT START -->
<script type="text/javascript">
	function calculate()
	{
	  var qty = document.getElementById('quantity').value;
	  var price = document.getElementById('perunit').value; 
	  document.getElementById('purchase_amount').value=parseInt(qty) * parseInt(price);
	}
	</script>
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-md-12">
	    	<div class="col-md-6 ml-auto mr-auto">
	    		<div class="card">
					  <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">receipt</i>
              </div>
              <h4 class="card-title">Edit Transaction</h4>
          	</div>
					  <div class="card-body">
				    	<?php
				    		if(isset($_GET['edittransaction'])) {
				    			$res = getDataById($conn, "addtransaction", $_GET['edittransaction']);
								$row = mysqli_fetch_array($res);
							?>
							<form name="form4" action="process/admin/usr_process.php" method="POST">
		        		<div class="form-group bmd-form-group">
		                	<label class="bmd-label-floating">Customer name</label>
		                	<input type="text" class="form-control" name="cname" value="<?php echo $row['cname']; ?>" autofocus="">
	            	   </div>
	            	   <div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">gas type</label>
	                	<input type="text" class="form-control" value="<?php echo $row['gtype']; ?>" name="gtype">
	            	</div>
	            	
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Quantity</label>
	                	<input type="text" class="form-control" value="<?php echo $row['quantity']; ?>" id="quantity" onkeyup="calculate();" name="quantity">
	            	</div>
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Price</label>
	                	<input type="text" class="form-control" value="<?php echo $row['price']; ?>" id="perunit" onkeyup="calculate();"  name="price">
	            	</div>
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">total</label>
	                	<input type="text" class="form-control" value="<?php echo $row['total']; ?>" id="purchase_amount"  name="total">
	            	</div>
	            	
	            	
	            	<div class="row">
	              	<div class="col-md-12">
	              		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	                		<button class="btn btn-success" name="edittransaction" type="submit">Update</button>
	                		<a class="btn btn-danger" href="transactiom_view.php">Cancel</a>
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