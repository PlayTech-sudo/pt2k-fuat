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


?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	   <div class="col-md-12">
		     <div class="card">
				<div class="card-header card-header-rose card-header-icon">
					<div class="card-icon">
						<i class="material-icons">person_add</i>
				   </div>
					 <h4 class="card-title">Transaction detail</h4>
				</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
			          			<tr>
						            <th class="text-center">Transaction ID</th>
						            <th>Transaction Date</th>
						             <th>Transaction Time</th>
						            
						            <th>Customer name</th>
						            <th>gas type</th>
					               
					                <th>quantity</th>
					                <th>per unit cost</th>
					                <th>total amount</th>
						            <th class="text-left">Actions</th>
			          			</tr>
		        		</thead>
		        		<tbody>
		        			<?php
		        				$res = getData($conn,"addtransaction");
		        				foreach ($res as $user) {
		        			?>
			          		<tr>
					            <td class="text-center"><?php echo $user['id']; ?></td>
					            <td><?php echo $user['edate']; ?></td>
					            <td><?php echo $user['etime']; ?></td>
					           
					            <td><?php echo $user['cname']; ?></td>
					            <td><?php echo $user['gtype']; ?></td>
					          
					            <td><?php echo $user['quantity']; ?></td>
					            <td><?php echo $user['price']; ?></td>
					            <td><?php echo $user['total']; ?></td>
					           <td class="text-center td-actions">
						            <a rel="tooltip" href="edit_transaction.php?edittransaction=<?php echo $user['id']; ?>" class="btn btn-success btn-link" title="Edit">
						              <i class="material-icons">edit</i>
						            </a>
						            <a rel="tooltip" href="process/admin/usr_process.php?deltransaction=<?php echo $user['id']; ?>" class="btn btn-danger btn-link" title="Delete">
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