<?php

	include("../dbconfig/dbcon.php");
	
	$searchStr = $_POST["searchStr"];
	$searchLists = "";
	$pageContents = "";
	$searchData = array();
	
	session_start();
	
	$customerID = $_SESSION["CustomerID"];	
	
	$sql = "SELECT * FROM quote_itemmaster IT LEFT JOIN quote_customer CT ON IT.CustomerID = CT.ID WHERE IT.CustomerID = ".$customerID." AND ( IT.ItemCode LIKE '%".$searchStr."%' OR IT.Description LIKE '%".$searchStr."%' )";	
	$result = $getcib->query($sql);
	$count = $result->num_rows;
		
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {			
			$searchLists .= "<tr>
								<td class='column1'>$row[Name]</td>
								<td class='column2'>$row[ItemCode]</td>
								<td class='column5'>$row[SKU]</td>
								<td class='column3'>$row[Description]</td>
								<td class='column4'>$row[Price]</td>								
								<td class='column6' onclick='addToCart(this)'>Add to Cart</td>
							</tr>";				
		}						
	}

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
				$pageContents .= "<li btnoption='move' pagenumber=".($i + 1)." class='active' onclick='getPageCatalogList(this, 1, 0)'><a>".($i + 1)."</a></li>";
			}else{
				$pageContents .= "<li btnoption='move' pagenumber=".($i + 1)." onclick='getPageCatalogList(this, 1, 0)'><a>".($i + 1)."</a></li>";
			}
		}
		$pageContents = "<li onclick='getPageCatalogList(this, 1, -1)'><a>&laquo;</a></li>".$pageContents."<li onclick='getPageCatalogList(this, 1, 1)'><a>&raquo;</a></li>";
	}	
						
	$searchData['list'] = $searchLists;
	$searchData['pagenum'] = $pageNum;
	$searchData['pagecontent'] = $pageContents;
	
	$getcib->close();
	
	echo json_encode($searchData);
	
?>