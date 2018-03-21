<?php

	include("../dbconfig/dbcon.php");
	
	$catalogLists = "";
	
	session_start();
	
	$customerID = $_SESSION["CustomerID"];
	$pageNum = $_POST['pageNum'];
	
	$searchOption = $_POST['searchOption'];
	$searchStr = $_POST['searchStr'];
	$cartOption = $_POST['cartOption'];	
	$itemCodeArray = array();
	
	$offset = ( $pageNum == 1 ) ? 0 : ( $pageNum - 1 ) * 100;	

	if ( $searchOption == 0 ){	
		$sql = "SELECT * FROM quote_itemmaster IT LEFT JOIN quote_customer CT ON IT.CustomerID = CT.ID WHERE IT.CustomerID = ".$customerID." LIMIT ".$offset.", 100";
	}else{
		$sql = "SELECT * FROM quote_itemmaster IT LEFT JOIN quote_customer CT ON IT.CustomerID = CT.ID WHERE IT.CustomerID = ".$customerID." AND ( IT.ItemCode LIKE '%".$searchStr."%' OR IT.Description LIKE '%".$searchStr."%' )  LIMIT ".$offset.", 100";	
	}

	$result = $getcib->query($sql);
		
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$k = 0;
			if ( $cartOption == 1 ){				
				$itemCodeArray = $_POST['itemCodeArray'];
				
				for ( $i = 1; $i < count($itemCodeArray); $i ++ ){					
					if ( $row['ItemCode'] == $itemCodeArray[$i] ){						
						$fontColor = 'cadetblue';
						$txt = 'Cancel';
						$k = 1;
						$catalogLists .= "<tr>
											<td class='column1'>$row[Name]</td>
											<td class='column2'>$row[ItemCode]</td>
											<td class='column5'>$row[SKU]</td>
											<td class='column3'>$row[Description]</td>
											<td class='column4'>$row[Price]</td>								
											<td class='column6' onclick='addToCart(this)' style='color:$fontColor'>$txt</td>
										</tr>";							
					}					
				}
			}else{
				$k = 1;
				$fontColor = 'rgba(95, 158, 160)';
				$txt = 'Add to Cart';
				$catalogLists .= "<tr>
									<td class='column1'>$row[Name]</td>
									<td class='column2'>$row[ItemCode]</td>
									<td class='column5'>$row[SKU]</td>
									<td class='column3'>$row[Description]</td>
									<td class='column4'>$row[Price]</td>								
									<td class='column6' onclick='addToCart(this)' style='color:$fontColor'>$txt</td>
								</tr>";				
			}
			
			if ( $k == 0 ){
				$fontColor = 'rgba(95, 158, 160)';
				$txt = 'Add to Cart';				
				$catalogLists .= "<tr>
									<td class='column1'>$row[Name]</td>
									<td class='column2'>$row[ItemCode]</td>
									<td class='column5'>$row[SKU]</td>
									<td class='column3'>$row[Description]</td>
									<td class='column4'>$row[Price]</td>								
									<td class='column6' onclick='addToCart(this)' style='color:$fontColor'>$txt</td>
								</tr>";							
			}
						
		}						
	}	
						
	$getcib->close();
	
	echo $catalogLists;
	
?>