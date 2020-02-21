<?php
	session_start();
	
	$title = "Purchase";
	$acc_code = "A07";
	require "./functions/access.php";
	require_once "./template/header.php";           
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
	require "functions/general.php";

	$tdate = date("Y-m-d");
	$ttime = date("h:i A");
	if(isset($_POST['purchase'])){
		$pdate = $_POST['pdate'];
		$ptime = $_POST['ptime'];
		$gas = $_POST['gas'];
		$perunit = $_POST['per_unit'];
		$pquantity = $_POST['quantity'];
		$purchase_amount = $_POST['purchase_amount'];
		$purchase_des = $_POST['note'];
		
	
    $sl = getsl($conn, "id", "purchase");
	 $sql = mysqli_query($conn,"INSERT INTO `purchase`(id, pdate, ptime,purchase_type,per_unit,quantity,purchase_amount,purchase_description) VALUES('".$sl."','".$pdate."','".$ptime."','".$gas."','".$perunit."','".$pquantity."','".$purchase_amount."','".$purchase_des."')") or die("cannot insert".mysqli_error($conn));
		

		}

		
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
	    <div class="col-sm-8 ml-auto mr-auto">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
					  	<div class="card-icon">
				  		  	<i class="material-icons">queue</i>
				    	</div>
				   	 <h4 class="card-title">Purchase</h4>
					</div>



			  		<div class="card-body">
			  			<form name="form6" action="" method="POST">
			  				<div class="row">
					      			<div class="col-md-6">
					          			<div class="form-group bmd-form-group">
					            		<input type="text" class="form-control" required="" value="<?php echo $tdate; ?>" placeholder="Date" name="pdate">
					            		<span class="bmd-help">Date</span>
					          	      	</div>
				        		   </div>
				        		<div class="col-md-6">
					          		<div class="form-group bmd-form-group">
					            		<input type="text" class="form-control" required="" placeholder="Time" value="<?php echo $ttime; ?>" name="ptime">
					            		<span class="bmd-help">Time</span>
					          		</div>
				        		</div>
			            	</div>
			    
							      <div class="row">
							          <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              
							              
							              <div class="dropdown bootstrap-select">
					            <select class="selectpicker" data-style="select-with-transition" required="" title="purchase_type" data-size="7" tabindex="-98" name="gas">
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
							        <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating"> per unit fuel cost</label>
							              <input type="text" class="form-control" required="" id="perunit" name="per_unit">
							              
							            </div>
							          </div>
							      </div>

							          <div class="row">
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">purchase quantity</label>
							              <input type="number" step="0.1" class="form-control" required="" id="quantity" onkeyup="calculate();" name="quantity">
							            </div>
							          </div>
							       <!--<div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">purchase amount</label>
							              <input type="text" class="form-control" required="" name="amount">
							            </div>
							          </div>-->
							          <div class="col-md-6">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">total</label>
				              <input type="text" class="form-control" required="" id="purchase_amount"  name="purchase_amount">
				            </div>
				        </div>
							      </div>

							      <div class="row">
							        <div class="col-md-12">
							          <div class="form-group bmd-form-group">
							            <label class="bmd-label-floating">Note</label>
							            <textarea class="form-control" rows="3" name="note"></textarea>
							          </div>
							        </div>
							      </div>

			                      
			      	
					           


						      	<button type="submit" name="purchase" class="btn btn-success">Submit</button> 
						      	<button type="reset" class="btn btn-danger float-right">Clear</button>
						      	<div class="text-center">
						      	<button class="btn btn-info float-center" onclick="window.location.href = 'purchase_view.php';">purchase details</button> </div>
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