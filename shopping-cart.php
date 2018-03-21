<?php
	include("common/common.php");	
	
	session_start();
	
	if ( isset($_SESSION["CustomerID"]) ) {		
		
?>

<?php
	include('common/header.php');
?>

		<div id="all">
			<div id="content">
			
				<!-- *** Page Number *** -->
				<div class="pages">						
					<ul class="pagination">
													
					</ul>
				</div>
				<!-- /#Page Number -->
			
				<!-- *** Shopping Cart List *** -->
				
				<div class="limiter" id="cart-section">
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table100">
								<table>
									<thead>
										<tr class="table100-head">											
											<th class="column2">Item</th>
											<th class="column2">Quantity</th>
											<th class="column2">Price</th>
											<th class="column2">Total</th>
											<th class="column4">Manage</th>																				
										</tr>
									</thead>
									
									<tbody id="tbody-cart">
                                        
                                    </tbody>
									
									<tfoot id="tfoot-cart">
										
									</tfoot>
									
								</table>
							</div>
							
							<div class="text-center">
								<button type="button" data-toggle="modal" class="btn btn-primary" id="btn-back">
									<i class="fa fa-backward"></i><span class="hidden-sm">Back</span>
								</button>							
													
								<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" id="btn-submit" style="margin-left:20px;">
									<i class="fa fa-rocket"></i><span class="hidden-sm">Submit</span>
								</button>
                            </div>
							
						</div>
					</div>
				</div>
				
				<!-- /#Shopping Cart List -->		

				<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">
									Customer Information
								</h4>
							</div>
							<div class="modal-body">
							
								<div id="success_message" class="col-sm-12"> <h3>Sent your message successfully!</h3> </div>
								<div id="error_message" class="col-sm-12"> <h3> Sorry, Please confirm your information. </h3></div>
								
								<div id="reused_form">																		
									<div class="form-group col-sm-6">
										<label for="email"> First Name:</label>
										<input class="modal-control" type="text" required maxlength="50" id="txt-firstname" placeholder="First Name">
									</div>
									<div class="form-group col-sm-6">
										<label for="email"> Last Name:</label>
										<input class="modal-control" type="text" required maxlength="50" id="txt-lastname" placeholder="Last Name">
									</div>
									<div class="form-group col-sm-12">
										<label for="email"> Company Name:</label>
										<input class="modal-control" type="text" required maxlength="100" id="txt-company" placeholder="Company Name">
									</div>
									<div class="form-group col-sm-12">
										<label for="email"> Address1:</label>
										<input class="modal-control" type="text" required maxlength="100" id="txt-address1" placeholder="Address1">
									</div>
									<div class="form-group col-sm-12">
										<label for="email"> Address2:</label>
										<input class="modal-control" type="text" required maxlength="100" id="txt-address2" placeholder="Address2">
									</div>
									<div class="form-group col-sm-12">
										<label for="email"> Address3:</label>
										<input class="modal-control" type="text" required maxlength="100" id="txt-address3" placeholder="Address3">
									</div>
									<div class="form-group col-sm-4">
										<label for="email"> City:</label>
										<input class="modal-control" type="text" required maxlength="50" id="txt-city" placeholder="City">
									</div>
									<div class="form-group col-sm-4">
										<label for="email"> State:</label>
										<input class="modal-control" type="text" required maxlength="50" id="txt-state" placeholder="State">
									</div>
									<div class="form-group col-sm-4">
										<label for="email"> ZipCode:</label>
										<input class="modal-control" type="text" required maxlength="50" id="txt-zipcode" placeholder="ZipCode">
									</div>
									<div class="form-group col-sm-12">
										<label for="email"> Phone:</label>
										<input class="modal-control" type="text" required maxlength="50" id="txt-phone" placeholder="Phone Number">
									</div>
									<div class="form-group col-sm-6">
										<label for="email"> Email:</label>
										<input class="modal-control" type="email" required maxlength="50" id="txt-email" placeholder="Email">
									</div>
									<div class="form-group col-sm-6">
										<label for="email"> PONumber:</label>
										<input class="modal-control" type="text" required maxlength="50" id="txt-ponumber" placeholder="PONumber">
									</div>
									
									<div class="form-group col-sm-12">
										<label for="name"> Comments:</label>
										<textarea class="modal-control" type="textarea"  id="txt-comments" placeholder="Your Comments Here" maxlength="6000" rows="7" style="height:100px;"></textarea>
									</div>
									
									<div class="text-center" id="send-email">								
										<button type="button" data-toggle="modal" class="btn btn-primary" id="btn-send-email">
											<i class="fa fa-rocket"></i><span class="hidden-sm">Send Email</span>
										</button>										
									</div>
									
									<div class="text-center" id="back-catalog">								
										<button type="button" data-toggle="modal" class="btn btn-primary" id="btn-back-catalog">
											<i class="fa fa-backward"></i><span class="hidden-sm">Back</span>
										</button>										
									</div>
																		
								</div>															
								
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /#content -->
			
<?php
	include('common/footer.php');	
?>

	<!--===============================================================================================-->
	<script src="js/cart.js"></script>	
	
</html>

<?php
	}else{
		header("Location: ".$server_url);
	}
?>


