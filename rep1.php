<?php
	session_start();
	$title = "Reports";
	$acc_code = "A03";
	$table = true;
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
    	<?php
    	if(isset($_POST['dreport'])){
    		$from1 = $_POST['from'];
    		$from = str_replace('/', '-', $from1);
    		$from = date("Y-m-d", strtotime($from));
    		$to1 = $_POST['to'];
    		$to = str_replace('/', '-', $to1);
    		$to = date("Y-m-d", strtotime($to));
				$rep = datewiseDetailedReport($conn, $from, $to);
			?>
			<div class="col-md-12 ml-auto mr-auto">
				<div class="card">
				  <div class="card-header card-header-primary card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">list</i>
				    </div>
				    <h4 class="card-title">Detailed Report</h4>
				  </div>
				  <div class="card-body">
	    			<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	        <thead>
	          <tr>
	            <th>Date</th>
	            <th>Employee</th>
	            <th>Vehicle No</th>
	            <th>Gasoline</th>
	            <th>Qty</th>
	            <th>Rate</th>
	            <th>Amount</th>
	            <th>Note</th>
	            <!-- <th class="disabled-sorting text-center">Actions</th> -->
	          </tr>
	        </thead>
	        <tbody>
	          <?php
	          	$tdate = date("Y-m-d");
	          	echo "<script type='text/javascript'>var printMsg = 'Detailed Reports from ".$from1." to ".$to1."';</script>";
      				while ($info = mysqli_fetch_array($rep)) {
      			?>
          		<tr>
		            <td><?php echo $info['edate']; ?></td>
		            <td><?php echo $info['user']; ?></td>
		            <td><?php echo $info['vno']; ?></td>
		            <td><?php echo $info['gtype']; ?></td>
		            <td><?php echo $info['qty']; ?></td>
		            <td><?php echo $info['price']; ?></td>
		            <td><?php echo $info['total']; ?></td>
		            <td><?php echo $info['note']; ?></td>

          		</tr>
        		<?php
        			}
        		?>
	        </tbody>
	        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        	</tfoot>
	      		</table>
	      	</div>
	      </div>
	    </div>
	    <!-- End of first report -->
      <?php
    		}elseif(isset($_POST['sreport'])){
    		$from1 = $_POST['from'];
    		$from = str_replace('/', '-', $from1);
    		$from = date("Y-m-d", strtotime($from));
    		$to1 = $_POST['to'];
    		$to = str_replace('/', '-', $to1);
    		$to = date("Y-m-d", strtotime($to));
				$rep = datewiseStockReport($conn, $from, $to);
    	?>	
    	<div class="col-md-8 ml-auto mr-auto">
				<div class="card">
				  <div class="card-header card-header-primary card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">list</i>
				    </div>
				    <h4 class="card-title">Stock Report</h4>
				  </div>
				  <div class="card-body">
	    			<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	        <thead>
	          <tr>
	            <th>Date</th>
	            <th>Gasoline</th>
	            <th>QTY</th>
	            <th>Price</th>
	            <th>Note</th>
	            <!-- <th class="disabled-sorting text-center">Actions</th> -->
	          </tr>
	        </thead>
	        <tbody>
	          <?php
	          	$tdate = date("Y-m-d");
	          	echo "<script type='text/javascript'>var printMsg = 'Stock Update Reports from ".$from1." to ".$to1."';</script>";
      				while ($info = mysqli_fetch_array($rep)) {
      			?>
          		<tr>
		            <td><?php echo $info['edate']; ?></td>
		            <td><?php echo $info['qty']; ?></td>
		            <td><?php echo $info['gtype']; ?></td>
		            <td><?php echo $info['price']; ?></td>
		            <td><?php echo $info['note']; ?></td>
          		</tr>
        		<?php
        			}
        		?>
	        </tbody>
	        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        	</tfoot>
	      		</table>
	      	</div>
	      </div>
	    </div>
	    <!-- End of second report -->

      <?php
    		}elseif(isset($_POST['ereport'])){
    		$from1 = $_POST['from'];
    		$from = str_replace('/', '-', $from1);
    		$from = date("Y-m-d", strtotime($from));
    		$to1 = $_POST['to'];
    		$to = str_replace('/', '-', $to1);
    		$to = date("Y-m-d", strtotime($to));
				$rep = datewiseExpenseReport($conn, $from, $to);
    	?>	
    	<div class="col-md-12 ml-auto mr-auto">
				<div class="card">
				  <div class="card-header card-header-primary card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">list</i>
				    </div>
				    <h4 class="card-title">Expense Report</h4>
				  </div>
				  <div class="card-body">
	    			<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	        <thead>
	          <tr>
	            <th>Date</th>
	            <th>Reason</th>
	            <th>Note</th>
	            <th>Amount</th>
	            <th>Employee Name</th>
	            <!-- <th class="disabled-sorting text-center">Actions</th> -->
	          </tr>
	        </thead>
	        <tbody>
	          <?php
	          	$tdate = date("Y-m-d");
	          	echo "<script type='text/javascript'>var printMsg = 'Expense Reports from ".$from1." to ".$to1."';</script>";
      				while ($info = mysqli_fetch_array($rep)) {
      			?>
          		<tr>
		            <td><?php echo $info['expense_date']; ?></td>
		            <td><?php echo $info['reason']; ?></td>
		            <td><?php echo $info['note']; ?></td>
		            <td><?php echo $info['amount']; ?></td>
		            <td><?php echo $info['employee_name']; ?></td>
          		</tr>
        		<?php
        			}
        		?>
	        </tbody>
	        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        	</tfoot>
	      		</table>
	      	</div>
	      </div>
	    </div>  <!-- end of third report-->

	    <?php
    		}elseif(isset($_POST['salesreport'])){
    		$from1 = $_POST['from'];
    		$from = str_replace('/', '-', $from1);
    		$from = date("Y-m-d", strtotime($from));
    		$to1 = $_POST['to'];
    		$to = str_replace('/', '-', $to1);
    		$to = date("Y-m-d", strtotime($to));
				$rep = datewiseSalesReport($conn, $from, $to);
    	?>	
    	<div class="col-md-12 ml-auto mr-auto">
				<div class="card">
				  <div class="card-header card-header-primary card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">list</i>
				    </div>
				    <h4 class="card-title">Sales Report</h4>
				  </div>
				  <div class="card-body">
	    			<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	        <thead>
	          <tr>
	            <th>Date</th>
	            <th>Customer ID</th>
	            <th>Sales Type</th>
	            <th>Machine Code</th>
	             <th>Starting Reading</th>
	              <th>Ending Reading</th>
	            <th>Sales Amount</th>
	            <th>Sales Description</th>
	            <!-- <th class="disabled-sorting text-center">Actions</th> -->
	          </tr>
	        </thead>
	        <tbody>
	          <?php
	          	$tdate = date("Y-m-d");
	          	echo "<script type='text/javascript'>var printMsg = 'Sales Reports from ".$from1." to ".$to1."';</script>";
      				while ($info = mysqli_fetch_array($rep)) {
      			?>
          		<tr>
		            <td><?php echo $info['sdate']; ?></td>
		            <td><?php echo $info['customer_id']; ?></td>
		            <td><?php echo $info['sales_type']; ?></td>
		            <td><?php echo $info['machine_code']; ?></td>
		            <td><?php echo $info['starting_reading']; ?></td>
		            <td><?php echo $info['ending_reading']; ?></td>
		            <td><?php echo $info['sales_amount']; ?></td>
		            <td><?php echo $info['sales_description']; ?></td>
          		</tr>
        		<?php
        			}
        		?>
	        </tbody>
	        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        	</tfoot>
	      		</table>
	      	</div>
	      </div>
	    </div>  <!-- end of fourth report-->

	      <?php
    		}elseif(isset($_POST['purchasereport'])){
    		$from1 = $_POST['from'];
    		$from = str_replace('/', '-', $from1);
    		$from = date("Y-m-d", strtotime($from));
    		$to1 = $_POST['to'];
    		$to = str_replace('/', '-', $to1);
    		$to = date("Y-m-d", strtotime($to));
				$rep = datewisePurchaseReport($conn, $from, $to);
    	?>	
    	<div class="col-md-12 ml-auto mr-auto">
				<div class="card">
				  <div class="card-header card-header-primary card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">list</i>
				    </div>
				    <h4 class="card-title">Purchase Report</h4>
				  </div>
				  <div class="card-body">
	    			<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	        <thead>
	          <tr>
	            <th>Date</th>
	            <th>Time</th>
	            <th>Purchase Type</th>
	            <th>Per Unit</th>
	             <th>Quantity</th>
	            <th>Purchase Amount</th>
	            <th>Purchase Description</th>
	            <!-- <th class="disabled-sorting text-center">Actions</th> -->
	          </tr>
	        </thead>
	        <tbody>
	          <?php
	          	$tdate = date("Y-m-d");
	          	echo "<script type='text/javascript'>var printMsg = 'Purchase Reports from ".$from1." to ".$to1."';</script>";
      				while ($info = mysqli_fetch_array($rep)) {
      			?>
          		<tr>
		            <td><?php echo $info['pdate']; ?></td>
		            <td><?php echo $info['ptime']; ?></td>
		            <td><?php echo $info['purchase_type']; ?></td>
		            <td><?php echo $info['per_unit']; ?></td>
		            <td><?php echo $info['quantity']; ?></td>
		            <td><?php echo $info['purchase_amount']; ?></td>
		            <td><?php echo $info['purchase_description']; ?></td>
          		</tr>
        		<?php
        			}
        		?>
	        </tbody>
	        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        	</tfoot>
	      		</table>
	      	</div>
	      </div>
	    </div>  <!-- end of fifth report-->

	      <?php
    		}elseif(isset($_POST['customerreport'])){
    		$from1 = $_POST['from'];
    		$from = str_replace('/', '-', $from1);
    		$from = date("Y-m-d", strtotime($from));
    		$to1 = $_POST['to'];
    		$to = str_replace('/', '-', $to1);
    		$to = date("Y-m-d", strtotime($to));
				$rep = datewiseCustomerReport($conn, $from, $to);
    	?>	
    	<div class="col-md-12 ml-auto mr-auto">
				<div class="card">
				  <div class="card-header card-header-primary card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">list</i>
				    </div>
				    <h4 class="card-title">Customer Report</h4>
				  </div>
				  <div class="card-body">
	    			<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	        <thead>
	          <tr>
	            <th>Date</th>
	            <th>Time</th>
	            <th>Customer name</th>
	            <th>Gas Type</th>
	             <th>Quantity</th>
	              <th>Price</th>
	            <th>Total</th>
	            
	            <!-- <th class="disabled-sorting text-center">Actions</th> -->
	          </tr>
	        </thead>
	        <tbody>
	          <?php
	          	$tdate = date("Y-m-d");
	          	echo "<script type='text/javascript'>var printMsg = 'Customer Reports from ".$from1." to ".$to1."';</script>";
      				while ($info = mysqli_fetch_array($rep)) {
      			?>
          		<tr>
		            <td><?php echo $info['edate']; ?></td>
		            <td><?php echo $info['etime']; ?></td>
		            <td><?php echo $info['cname']; ?></td>
		            <td><?php echo $info['gtype']; ?></td>
		            <td><?php echo $info['quantity']; ?></td>
		            <td><?php echo $info['price']; ?></td>
		            <td><?php echo $info['total']; ?></td>
		   
          		</tr>
        		<?php
        			}
        		?>
	        </tbody>
	        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        	</tfoot>
	      		</table>
	      	</div>
	      </div>
	    </div>  <!-- end of sixth report-->






	    <?php
	    	}
	  	?>
	  </div>              
	</div>
</div>
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	
?>