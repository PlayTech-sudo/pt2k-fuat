<?php
	session_start();
	
	$title = "Inventory";
	$acc_code = "A09";
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
	 
	   
	    <div class="col-md-8">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
				  	<div class="card-icon">
				    	<i class="material-icons">list_alt</i>
				    </div>
				    <h4 class="card-title">Inventory</h4>
					</div>
			  	<div class="card-body">
			    	<table class="table">
								        		<thead>
								          			<tr>
											           
											            <th>Fuel Type</th>
											             <th>Quantity</th>
											            <th>Price</th>
											            <th>Status</th>
				
								          			</tr>
								        		</thead>
								        		<tbody>
								        			<?php
								        				$res = getData($conn, "inventory");
								        				foreach ($res as $user) {
								        			?>
									          		<tr>
											           <?php  $qty=$user['qty']; ?>
											           <?php  $type=$user['fuel_type']; ?>
											            <td><?php echo $type; ?></td>
											            <td><?php echo  $qty; ?></td>
											            <td><?php echo $user['price']; ?></td>
                                                           
                                              <td> <?php
												    $sql = "SELECT * FROM status where gas='$type'";
													$result = mysqli_query($conn, $sql) or die("cannot retrieve ".mysqli_error($conn));
													
													if(mysqli_num_rows($result)>0){
													
												    while($row = mysqli_fetch_array($result)){
												     
													$stock = $row['stock'];
													
													
												 ?>
												 <?php if($stock==$qty) {  ?>
                                         <div class="progress" style= "height:20px;">
                                    <div class="progress-bar bg-success progress-bar-striped" style="width:100%">100%</div>

                                         </div>
                                               <?php  } else if($stock<$qty and $stock>=$qty/2) {   ?>
                                                 
                                         <div class="progress" style= "height:20px;">
                                    <div class="progress-bar bg-success progress-bar-striped" style="width:50%">50%+</div>
                                    
                                         </div>
                                               <?php } else if($stock<$qty/2 and $stock>=$qty/4) {  ?>
                                      <div class="progress" style= "height:20px;" >
                                    <div class="progress-bar bg-info progress-bar-striped" style="width:25%"></div>
                                    <span> &nbsp;&nbsp;25%+</span>
                                         </div>
                                               <?php }else if($stock<$qty/4 and $stock>=$qty/10) {  ?>
                                      <div class="progress"style= "height:20px;" >
                                    <div class="progress-bar bg-warning progress-bar-striped" style="width:10%;" ></div>
                                    <span> &nbsp;&nbsp;10%+</span>
                                         </div>
                                               <?php  } else if($stock<$qty/10 and $stock>=0) {  ?>
                                      <div class="progress"style= "height:20px;" >
                                    <div class="progress-bar bg-danger progress-bar-striped" style="width:10%;" ></div>
                                    <span> &nbsp;&nbsp;0%+</span>
                                         </div>
                                               <?php  } ?>


                                               <?php  } ?>
                                               <?php  } ?>
											            
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
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	
?>