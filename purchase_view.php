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


?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	   <div class="col-md-12">
		     <div class="card">
				<div class="card-header card-header-rose card-header-icon">
					<div class="card-icon">
						<i class="material-icons">local_grocery_store</i>
				   </div>
					 <h4 class="card-title">Purchase</h4>
				</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
			          			<tr>
						            <th class="text-center">ID</th>
						            <th>Purchase Date</th>
						             <th>Purchase Time</th>
						            
						            <th>Purchase Type</th>
						            <th>per unit fuel cost</th>
					               
					                <th>Purchase quantity</th>
					                <th>Purchase Amount</th>
					                <th>Note</th>
						            <th class="text-left">Actions</th>
			          			</tr>
		        		</thead>
		        		<tbody>
		        			<?php
		        				$res = getData($conn,"purchase");
		        				foreach ($res as $user) {
		        			?>
			          		<tr>
					            <td class="text-center"><?php echo $user['id']; ?></td>
					            <td><?php echo $user['pdate']; ?></td>
					            <td><?php echo $user['ptime']; ?></td>
					           
					            <td><?php echo $user['purchase_type']; ?></td>
					            <td><?php echo $user['per_unit']; ?></td>
					          
					            <td><?php echo $user['quantity']; ?></td>
					            <td><?php echo $user['purchase_amount']; ?></td>
					            <td><?php echo $user['purchase_description']; ?></td>
					           <td class="text-center td-actions">
						            <a rel="tooltip" href="edit_purchase.php?editpurchase=<?php echo $user['id']; ?>" class="btn btn-success btn-link" title="Edit">
						              <i class="material-icons">edit</i>
						            </a>
						            <a rel="tooltip" href="process/admin/usr_process.php?delpurchase=<?php echo $user['id']; ?>" class="btn btn-danger btn-link" title="Delete">
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