<?php

	include("common/common.php");
	include("dbconfig/dbcon.php");
	
	$catalogLists = "";
	$pageContents = "";
	
	session_start();
	
	if ( isset($_SESSION["CustomerID"]) ) {
		$customerID = $_SESSION["CustomerID"];
		$sql = "SELECT * FROM quote_itemmaster IT LEFT JOIN quote_customer CT ON IT.CustomerID = CT.ID WHERE IT.CustomerID = ".$customerID;
		
		$result = $getcib->query($sql);
		$count = $result->num_rows;		
		
		if ( intval($count / 100) > 0 ){
			if ( ($count / 100) > intval($count / 100) )
				$pageNum = intval($count / 100) + 1;
			else
				$pageNum = intval($count / 100);
		}else{
			$pageNum = 1;
		}			
				
		if ( $pageNum > 1 ){
			for ( $i = 0; $i < $pageNum; $i ++ ){
				if ( $i == 0 ){
					$pageContents .= "<li btnoption='move' pagenumber=".($i + 1)." class='active' onclick='getPageCatalogList(this, 0, 0)'><a>".($i + 1)."</a></li>";
				}else{
					$pageContents .= "<li btnoption='move' pagenumber=".($i + 1)." onclick='getPageCatalogList(this, 0, 0)'><a>".($i + 1)."</a></li>";
				}
			}
			$pageContents = "<li onclick='getPageCatalogList(this, 0, -1)'><a>&laquo;</a></li>".$pageContents."<li onclick='getPageCatalogList(this, 0, 1)'><a>&raquo;</a></li>";
		}
				
		$getcib->close();
		
?>

<?php
	include('common/header.php');
?>

		<div id="all">
			<div id="content">
			
				<!-- *** Catalog List *** -->
				
				<div class="limiter" id="cataloglist-section">
					
					<!-- *** Page Number *** -->
					<div class="pages">						
						<ul class="pagination">
							<?php echo $pageContents; ?>							
						</ul>
					</div>
					<!-- /#Page Number -->
					
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table100">
								<table>
								
									<thead>
										<tr class="table100-head">
											<th class="column1">Customer</th>
											<th class="column2">Item</th>
											<th class="column5">Stock</th>
											<th class="column3">Description</th>
											<th class="column4">Price</th>											
											<th class="column6">Cart Option</th>
										</tr>
									</thead>
									
									<tbody id="tbody-cataloglists">																				
										
									</tbody>
									
								</table>
							</div>
						</div>
					</div>
										
				</div>
				
				<!-- /#Catalog List -->										

			</div>
			<!-- /#content -->

<?php

	include('common/footer.php');	

?>

	<!--===============================================================================================-->
	<script src="js/catalog.js"></script>
	
</html>

<?php

	}else{
		header("Location: ".$server_url);
	}

?>
			

