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

	$tdate = date("Y-m-d");
	$ttime = date("h:i A");
	if(isset($_POST['purchase'])){
		$edate = $_POST['edate'];
		$etime = $_POST['etime'];
		$gas = $_POST['gas'];
		$nam = $_POST['nam'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$total= $_POST['total'];
		
		
	
    $sl = getsl($conn, "id", "addtransaction");
	 $sql = mysqli_query($conn,"INSERT INTO `addtransaction`(id, edate, etime,cname,gtype,quantity,price,total) VALUES('".$sl."','".$edate."','".$etime."','".$nam."','".$gas."','".$quantity."','".$price."','".$total."')") or die("cannot insert".mysqli_error($conn));
		

		}

		
?>
<!-- MAIN CONTENT START -->
<script type="text/javascript">
	function calculate()
	{
	  var qty = document.getElementById('quantity').value;
	  var price = document.getElementById('price').value; 
	  document.getElementById('total').value=parseInt(qty) * parseInt(price);
	}
</script>

<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-sm-8 ml-auto mr-auto">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
					  	<div class="card-icon">
				  		  	<i class="material-icons">person_add</i>
				    	</div>
				   	 <h4 class="card-title">transaction entry</h4>
					</div>



			  		<div class="card-body">
			  			<form name="form6" action="" method="POST">
			  				<div class="row">
					      			<div class="col-md-6">
					          			<div class="form-group bmd-form-group">
					            		<input type="text" class="form-control" required="" value="<?php echo $tdate; ?>" placeholder="Date" name="edate">
					            		<span class="bmd-help">Date</span>
					          	      	</div>
				        		   </div>
				        		<div class="col-md-6">
					          		<div class="form-group bmd-form-group">
					            		<input type="text" class="form-control" required="" placeholder="Time" value="<?php echo $ttime; ?>" name="etime">
					            		<span class="bmd-help">Time</span>
					          		</div>
				        		</div>
			            	</div>
			    
							      <div class="row">
							         
							        
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              
							              
							              <div class="dropdown bootstrap-select">
					            <select class="selectpicker" data-style="select-with-transition" required="" title="customer name" data-size="7" tabindex="-98" name="nam">
					            	<?php
				    $sq = "SELECT * FROM addcustomer ";
					$res = mysqli_query($conn, $sq) or die("cannot retrieve ".mysqli_error($conn));
					if(mysqli_num_rows($res)>0){
					
				    while($row = mysqli_fetch_array($res)){
					$nam = $row['cname'];
				 ?>
					            	<option><?php echo $nam ?></option>
					            	 <?php } ?>
               <?php } ?>

					            </select>
					    			</div>
							            </div>
							          </div>
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              
							              
							              <div class="dropdown bootstrap-select">
					            <select class="selectpicker" data-style="select-with-transition" required="" title="gas_type" data-size="7" tabindex="-98" name="gas">
					            	<?php
				    $sql = "SELECT * FROM status ";
					$result = mysqli_query($conn, $sql) or die("cannot retrieve ".mysqli_error($conn));
					if(mysqli_num_rows($result)>0){
					
				    while($row = mysqli_fetch_array($result)){
					$gas = $row['gas'];
				 ?>
					            	<option><?php echo $gas ?></option>
					            	 <?php } ?>
               <?php } ?>

					            </select>
					    			</div>
							            </div>
							          </div>
							      </div>

							          <div class="row">
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">gas quantity</label>
							              <input type="number" step="0.1" class="form-control" required="" id="quantity" name="quantity">
							            </div>
							          </div>
							       
							          <div class="col-md-6">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">per unit cost</label>
				              <input type="text" class="form-control" required="" id="price" onkeyup="calculate();"  name="price">
				            </div>
				        </div>
							      </div>

							     <div class="row">
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">total amount</label>
							              <input type="number" step="0.1" class="form-control" required="" id="total" name="total">
							            </div>
							          </div>
							      </div>

			                      
			      	
					           


						      	<button type="submit" name="purchase" class="btn btn-success">Submit</button> 
						      	<button type="reset" class="btn btn-danger float-right">Clear</button>
						      	<div class="text-center">
						      	<button class="btn btn-info float-center" onclick="window.location.href = 'transaction_view.php';">transaction details</button> </div>
						      	<div class="clearfix"></div>
						  </form>
			 	</div>
		   </div>
		</div>

</div>
</div>
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	
?>