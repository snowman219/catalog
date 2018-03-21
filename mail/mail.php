<?php

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$company = $_POST['company'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$address3 = $_POST['address3'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
	$phone = $_POST['phone'];
	$customerEmail = $_POST['email'];
	$ponumber = $_POST['ponumber'];
	$comments = $_POST['comments'];
	$insertCartContent = $_POST['insertCartContent'];	
	$cartContent = $_POST['cartcontent'];
	$quoteNumber = round(microtime(true));
	$totalPrice = 0;	

	$cartArray = explode('@',$cartContent);
	$cartCounts = sizeOf($cartArray) / 5;

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require '../vendor/phpmailer/phpmailer/src/SMTP.php';
	require '../vendor/phpmailer/phpmailer/src/Exception.php';

	// Instantiate a new PHPMailer 
	$mail = new PHPMailer;

	// Tell PHPMailer to use SMTP
	$mail->isSMTP();
	$mail->SMTPDebug = 2;

	// Replace sender@example.com with your "From" address. 
	// This address must be verified with Amazon SES.
	$mail->setFrom('noreply@producthelpdesk.net');

	// Replace recipient@example.com with a "To" address. If your account 
	// is still in the sandbox, this address must be verified.
	// Also note that you can include several addAddress() lines to send
	// email to multiple recipients.
	$mail->addAddress($customerEmail);

	// Replace smtp_username with your Amazon SES SMTP user name.
	$mail->Username = 'AKIAJQXF7AZP4AX7YATQ';

	// Replace smtp_password with your Amazon SES SMTP password.
	$mail->Password = 'AsO36UGbV/flPbRMBCmParCuje3F3h/f+kIMDhVw6zL4';

	// Specify a configuration set. If you do not want to use a configuration
	// set, comment or remove the next line.
	//$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
	 
	// If you're using Amazon SES in a region other than US West (Oregon), 
	// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
	// endpoint in the appropriate region.
	$mail->Host = 'email-smtp.us-west-2.amazonaws.com';

	// The subject line of the email
	$mail->Subject = 'AddonNetworks Quote Request';

	// The HTML-formatted body of the email

	$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html  xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="format-detection" content="telephone=no">
			
			<title></title>
			<!--[if (gte mso 9)|(IE)]>
			  <style type="text/css">
			  table {border-collapse: collapse!important !important !important !important;}
			  </style>
			<![endif]-->   

			<!--[if gte mso 9]><xml>
			  <o:OfficeDocumentSettings>
			  <o:AllowPNG/>
			  <o:PixelsPerInch>96</o:PixelsPerInch>
			  </o:OfficeDocumentSettings>
			</xml><![endif]-->    

			<style type="text/css">
			@-ms-viewport {width: device-width;}
			a[x-apple-data-detectors] {
				color: inherit !important;
				text-decoration: none !important;
				font-size: inherit !important;
				font-family: inherit !important;
				font-weight: inherit !important;
				line-height: inherit !important;
			}
			</style>

			<!-- css  основной -->       

			<!-- media queries -->
			
			<!-- <style type="text/css">
			@media only screen and (max-width: px) {
				.column_empty {
					display:none!important;
				}
				.{
					text-align: justify !important; 
				}    
			   }
					 
			</style> -->
		  
		</head>
		
		<body yahoo bgcolor="#f0f0f0" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;width:100%!important;background-color:#f0f0f0 !important;min-width:100%;" >
			<div>
				<span style="color:transparent !important;overflow:hidden !important;display:none !important;font-size:0px !important;line-height:0px !important;height:0 !important;opacity:0 !important;visibility:hidden !important;width:0 !important;mso-hide:all;" >
					<!-- ВCТАВИТЬ pre-header-->
				</span>
			</div>
			
			<table bgcolor="#f0f0f0" width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;color:#002a61;" >    
				<tr bgcolor="#f0f0f0">
					<td valign="top" width="100%" height="16" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
						&nbsp;
					</td>
				</tr>
				
				<tr bgcolor="#f0f0f0">
					<td align="left" valign="top" width="100%" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >     
						<center class="wrapper" style="background-color:#f0f0f0 !important;width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
							<div class="webkit" style="max-width:640px;background-color:#ffffff!important;" >
								<!--[if (gte mso 9)|(IE)]>
								<table width="640" align="center" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;color:#002a61;" >
								<tr><td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
								<![endif]-->
								<table bgcolor="#ffffff" class="mcontainer" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;color:#002a61;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;max-width:640px;border:1px solid #80b9b9;" >
									<tr bgcolor="#80b9b9">
										<td  align="center" valign="center" style="padding-left:20px;font-size:26px;line-height:30px;padding-top:0px;padding-bottom:0px;padding-right:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" >
											<img src="http://image.sendsay.ru/image/x_1491823915853346/RedHat/addonlogo_tran.png" alt="addon" title="addon" width="214" height="92" border="0" style="max-width:214px;overflow:visible;width:100%;display:block;height:auto;" >
										</td>
									</tr>
						
									<tr bgcolor="#ffffff">
										<td  align="center" valign="center" style="padding-left:20px;font-size:26px;line-height:30px;padding-top:10px;padding-bottom:0px;padding-right:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" >
											<b>AddonNetworks Quote Request</b>
										</td>
									</tr>

									<tr bgcolor="#ffffff">
										<td align="center" valign="top" width="100%" style="padding-bottom:0px;padding-right:24px;padding-left:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:18px;line-height:24px;" >
											'.$quoteNumber.'
										</td>
									</tr>
						
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:0px;font-size:16px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" >
											<b>Requested Ship To Address:</b>
										</td>
									</tr>
						
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:0px;font-size:14px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" > 
											'.$company.'
										</td>
									</tr>
									
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:0px;font-size:14px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" > 
											'.$address1.'
										</td>
									</tr>';
									
	if ( $address2 != '' ){
		$body .=					'<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:0px;font-size:14px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" > 
											'.$address2.'
										</td>
									</tr>';
	}

	if ( $address3 != '' ){
		$body .=					'<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:0px;font-size:14px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" > 
											'.$address3.'
										</td>
									</tr>';
	}								
									
	$body .=						'<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:0px;font-size:16px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" >
											<b>Phone: </b>
										</td>
									</tr>
									
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:0px;font-size:14px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" > 
											'.$phone.'
										</td>
									</tr>
						
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:0px;font-size:16px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" >
											<b>Email: </b>
										</td>
									</tr>
									
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right: 24px;padding-left: 24px;padding-bottom: 0px;font-size: 14px;line-height: 24px;"> 
											<a href="mailto:" style="color:#002a61;">'.$customerEmail.'
										</td>
									</tr>
									
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:0px;font-size:16px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" >
											<b>Purchase Order Number: </b>
										</td>
									</tr>
									
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:5px;font-size:14px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" > 
											'.$ponumber.'
										</td>
									</tr>
									
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;font-size:5px;line-height:5px;border-top-width:1px;border-top-style:solid;border-top-color:#80b9b9;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" > 
											&nbsp;
										</td>
									</tr>
						
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:0px;font-size:16px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" >
											<b>Comments:</b>
										</td>
									</tr>
									
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;padding-bottom:5px;font-size:14px;line-height:24px;padding-top:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" > 
											'.$comments.'
										</td>
									</tr>
									
									<tr bgcolor="#ffffff">
										<td align="left" valign="top" width="100%" style="padding-right:24px;padding-left:24px;font-size:5px;line-height:5px;border-top-width:1px;border-top-style:solid;border-top-color:#80b9b9;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;" > 
											&nbsp;
										</td>
									</tr>

									<!-- 2-колоночный макет -->

									<tr bgcolor="#ffffff">
										<td  width="100%" align="left" valign="top" class="table" style="padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;line-height:24px;text-align:left;font-size:0;padding-right:24px;padding-left:24px;" >
											<!-- левая колонка -->
											<!--[if (gte mso 9)|(IE)]>
											<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;color:#002a61;" >
												<tr>
													<td width="342" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
											<![endif]-->
											<div class="column_left" style="max-width:342px;overflow:visible;width:100%;display:inline-block;vertical-align:top;" >
												<table class="inner" bgcolor="" width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;color:#002a61;" >
													<tr>
														<td align="left" valign="top" style="padding-bottom:16px;padding-top:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
															<b>Item</b>
														</td>
										
														<td align="left" valign="top" style="padding-bottom:16px;padding-top:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
															<b>SKU</b>
														</td>
										
														<td  align="left" valign="top" style="padding-bottom:16px;padding-top:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
															<b>Description</b>
														</td>
													</tr>';
	for ( $i = 0; $i < $cartCounts; $i ++ ){
		$body .=									'<tr>
														<td align="left" valign="top" style="padding-bottom:16px;font-size:14px;padding-top:0;padding-right:10px;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;line-height:24px;" >
															'.$cartArray[$i * 5].'
														</td>
														
														<td align="left" valign="top" style="padding-bottom:16px;font-size:14px;padding-top:0;padding-right:10px;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;line-height:24px;" >
															'.$cartArray[$i * 5 + 1].'
														</td>
														
														<td  align="left" valign="top" style="padding-bottom:16px;font-size:14px;padding-top:0;padding-right:10px;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;line-height:24px;" >
															'.$cartArray[$i * 5 + 2].'
														</td>
													</tr>';
	}												
	$body .=									'</table>
											</div><!--[if (gte mso 9)|(IE)]></td><td width="248" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" ><![endif]-->
											
											<div class="column_right" style="max-width:248px;overflow:visible;width:100%;display:inline-block;vertical-align:top;" > 
												<!-- правая колонка -->
												<table class="inner" bgcolor="" width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;color:#002a61;" >
													<tr>
														<td align="left" valign="top" style="padding-bottom:16px;padding-top:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >

															<table class="inner" bgcolor="" width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;color:#002a61;" >
																<tr>
																	<td align="left" valign="top" style="padding-bottom:16px;padding-top:0;padding-right:0px;padding-left:5px;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
																		<b>Quantity</b>
																	</td>
																	
																	<td align="left" valign="top" style="padding-bottom:16px;padding-top:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
																		<b>Price</b>
																	</td>
																	
																	<td  align="right" valign="top" style="padding-bottom:16px;padding-top:0;padding-right:0;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
																		<b>Ext.Price</b>
																	</td>
																</tr>';
	for ( $i = 0; $i < $cartCounts; $i ++ ){
		$extPrice = $cartArray[$i * 5 + 3] * $cartArray[$i * 5 + 4];
		$totalPrice += $extPrice;
		$body .=												'<tr>
																	<td align="center" valign="top" style="padding-bottom:16px;font-size:14px;padding-top:0;padding-right:10px;padding-left:5px;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;line-height:24px;" >
																		'.$cartArray[$i * 5 + 3].'
																	</td>
																	
																	<td align="left" valign="top" style="padding-bottom:16px;font-size:14px;padding-top:0;padding-right:10px;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;line-height:24px;" >
																		'.$cartArray[$i * 5 + 4].'
																	</td>
																	
																	<td  align="right" valign="top" style="padding-bottom:16px;font-size:14px;padding-top:0;padding-right:10px;padding-left:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;line-height:24px;" >
																		'.$extPrice.'
																	</td>
																</tr>';
	}															
	$body .=												'</table>
														</td>
													</tr>                                    
												</table>
											</td>
										</tr>
									
										<tr>
											<td align="right" valign="top" style="padding-bottom:16px;font-size:16px;padding-top:0;padding-right:24px;padding-left:24px;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;line-height:24px;" >
												<table class="inner" bgcolor="" width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;color:#002a61;" >
													<tr>
														<td align="left" width="57.9%" valign="top" style="padding-bottom:16px;padding-top:0;padding-right:0px;padding-left:0px;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
														</td>
												
														<td align="left" width="17.62%" valign="top" style="padding-bottom:16px;padding-top:0;padding-right:0;padding-left:5px;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
															Total
														</td>
												
														<td  align="right" valign="top" style="padding-bottom:16px;padding-top:0;padding-right:0;padding-left:50px;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;overflow:hidden !important;font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:24px;" >
															'.$totalPrice.'
														</td>
													</tr>                                    
												</table>                            
											</td>                            
										</tr>
									</table>
								</div>
								<!--[if (gte mso 9)|(IE)]>
								</td>
								</tr>
								</table>
								<![endif]-->
							</td>
						</tr>
						<!--[if (gte mso 9)|(IE)]>
						</td></tr></table>
						<![endif]-->
					</table>
				</div>
			</center>
		</td>
	</tr>
	</table>    
	</body>
	</html>';

	$mail->Body = $body;
	
	// Creating PDF and save mail directory
	require 'request-pdf.php';	
	
	// Attach PDF
	$file_to_attach = 'AddOnRequest'.$quoteNumber.'.pdf';

	$mail->AddAttachment( $file_to_attach , 'AddOnRequest'.$quoteNumber.'.pdf' );	

	// Tells PHPMailer to use SMTP authentication
	$mail->SMTPAuth = true;

	// Enable TLS encryption over port 587
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	// Tells PHPMailer to send HTML-formatted email
	$mail->isHTML(true);	
		
	if ( $mail->send() ) {
		// Registering customer information		
		require '../ajax-php/register-cartlists.php';	
		
		// Remove PDF
		unlink('AddOnRequest'.$quoteNumber.'.pdf');
	} else {		
		echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
	}	

?>