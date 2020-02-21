<?php
	session_start();
	
	$title = "Reports";
	$acc_code = "A03";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
	require "functions/general.php";	
?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md-4">
    		<div class="card">
				  <div class="card-header card-header-info card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">assignment</i>
				    </div>
				    <h4 class="card-title">Detailed Reports</h4>
				  </div>
				  <div class="card-body">
				  	<form name="form2" action="rep1.php" method="POST">
					    <div class="form-group bmd-form-group">
		            <input type="text" name="from" class="form-control datepicker" value="" placeholder="From">
		          </div>
		          <div class="form-group bmd-form-group">
		            <input type="text" name="to" class="form-control datepicker" value="" placeholder="To">
		          </div>  
	            <button type="submit" name="dreport" class="btn btn-success">Reports</button>
				  	</form>
				  </div>
				</div>
    	</div> 
    	<div class="col-md-4">
    		<div class="card">
				  <div class="card-header card-header-info card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">assignment</i>
				    </div>
				    <h4 class="card-title">Stock Update Reports</h4>
				  </div>
				  <div class="card-body">
				  	<form name="form2" action="rep1.php" method="POST">
					    <div class="form-group bmd-form-group">
		            <input type="text" name="from" class="form-control datepicker" value="" placeholder="From">
		          </div>
		          <div class="form-group bmd-form-group">
		            <input type="text" name="to" class="form-control datepicker" value="" placeholder="To">
		          </div>  
	            <button type="submit" name="sreport" class="btn btn-success">Reports</button>
				  	</form>
				  </div>
				</div>
    	</div> 
      
      <div class="col-md-4">
    		<div class="card">
				  <div class="card-header card-header-info card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">monetization_on</i>
				    </div>
				    <h4 class="card-title">Expense Reports</h4>
				  </div>
				  <div class="card-body">
				  	<form name="form2" action="rep1.php" method="POST">
					    <div class="form-group bmd-form-group">
		            <input type="text" name="from" class="form-control datepicker" value="" placeholder="From">
		          </div>
		          <div class="form-group bmd-form-group">
		            <input type="text" name="to" class="form-control datepicker" value="" placeholder="To">
		          </div>  
	            <button type="submit" name="ereport" class="btn btn-success">Reports</button>
				  	</form>
				  </div>
				</div>
    	</div> 
      </div>
<div class="row">
      <div class="col-md-4">
    		<div class="card">
				  <div class="card-header card-header-info card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">business_center</i>
				    </div>
				    <h4 class="card-title">Sales Reports</h4>business_center
				  </div>
				  <div class="card-body">
				  	<form name="form2" action="rep1.php" method="POST">
					    <div class="form-group bmd-form-group">
		            <input type="text" name="from" class="form-control datepicker" value="" placeholder="From">
		          </div>
		          <div class="form-group bmd-form-group">
		            <input type="text" name="to" class="form-control datepicker" value="" placeholder="To">
		          </div>  
	            <button type="submit" name="salesreport" class="btn btn-success">Reports</button>
				  	</form>
				  </div>
				</div>
    	</div> 

    	<div class="col-md-4">
    		<div class="card">
				  <div class="card-header card-header-info card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">local_grocery_store</i>
				    </div>
				    <h4 class="card-title">Purchase Reports</h4>
				  </div>
				  <div class="card-body">
				  	<form name="form2" action="rep1.php" method="POST">
					    <div class="form-group bmd-form-group">
		            <input type="text" name="from" class="form-control datepicker" value="" placeholder="From">
		          </div>
		          <div class="form-group bmd-form-group">
		            <input type="text" name="to" class="form-control datepicker" value="" placeholder="To">
		          </div>  
	            <button type="submit" name="purchasereport" class="btn btn-success">Reports</button>
				  	</form>
				  </div>
				</div>
    	</div> 


    	<div class="col-md-4">
    		<div class="card">
				  <div class="card-header card-header-info card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">person_add</i>
				    </div>
				    <h4 class="card-title">Customer Reports</h4>
				  </div>
				  <div class="card-body">
				  	<form name="form2" action="rep1.php" method="POST">
					    <div class="form-group bmd-form-group">
		            <input type="text" name="from" class="form-control datepicker" value="" placeholder="From">
		          </div>
		          <div class="form-group bmd-form-group">
		            <input type="text" name="to" class="form-control datepicker" value="" placeholder="To">
		          </div>  
	            <button type="submit" name="customerreport" class="btn btn-success">Reports</button>
				  	</form>
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