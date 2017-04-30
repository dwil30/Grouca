<?php    
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['continue'])) 
{
    if ($_POST['price'] == 1){$price = 7900;}
    else {$price = 57900;}
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $CC = $_POST['CC'];
    $CVV = $_POST['CVV'];
    $year = substr($_POST['Year'], -2);
    $expiration = $_POST['Month'].$year;    

    $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><Request></Request>");
                            
     $order = $xml->addChild('NewOrder');
     $order->addChild('OrbitalConnectionUsername','sb010647');
     $order->addChild('OrbitalConnectionPassword','12yb58U0q70P54x');
     $order->addChild('IndustryType','EC');
     $order->addChild('MessageType','A');
     $order->addChild('BIN','000002');
     $order->addChild('MerchantID','700000010647');
     $order->addChild('TerminalID','001');
     //$order->addChild('CardBrand','');
     $order->addChild('AccountNum',$CC);
     $order->addChild('Exp',$expiration);
     $order->addChild('CurrencyCode','840');
     $order->addChild('CurrencyExponent','2');
     $order->addChild('AVSzip',$zip);
     $order->addChild('AVSaddress1',$address);
    // $order->addChild('AVSaddress2');
     $order->addChild('AVScity',$city);
     $order->addChild('AVSstate',$state);
     //$order->addChild('AVSphoneNum','');
     $order->addChild('AVSname',$name);
     $order->addChild('AVScountryCode','US');
     $order->addChild('OrderID','1');
     $order->addChild('Amount',$price);
     //$order->addChild('BillerReferenceNumber','song1.mp3');

    Header('Content-type: text/xml');

    
    
    //$host = "https://orbital1.paymentech.net"; 
    $host = "https://www.chasepaymentechhostedpay-var.com/securepayments/a1/cc_collection.php";

	   $input_xml = (string) $xml->asXML(); 
    print_r($input_xml);
    
		$header = "POST /AUTHORIZE/ HTTP/1.0\r\n"; 
		$header.= "MIME-Version: 1.0\r\n";
		$header.= "Content-type: application/PTI52\r\n";
		$header.= "Content-length: "  .strlen($input_xml) . "\r\n";
		$header.= "Content-transfer-encoding: text\r\n";
		$header.= "Request-number: 1\r\n";
		$header.= "Document-type: Request\r\n";
		$header.= "Interface-Version: CartThrob vs. 0430+ PHP\r\n";
		$header.= "Connection: close \r\n\r\n";  
		$header.= $input_xml;
 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$host);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);   // setting header manually. 
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $header);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($ch);  
		
		$resp['authorized']	 	= FALSE; 
		$resp['declined'] 		= FALSE; 
		$resp['transaction_id']	= NULL;
		$resp['failed']			= TRUE; 
		$resp['error_message']	= "";
		$resp['processing']		= FALSE;
		
		if (curl_errno($ch)) 
		{
			$resp['error_message']	= $this->lang('curl_gateway_failure'); 
			return $resp;
		}
		else 
		{
			curl_close($ch);
		}
		
 		$transaction = new SimpleXMLElement($data);
		if (!$transaction)
		{
 			$resp['error_message']	= $this->lang('curl_gateway_failure'); 
			return $resp; 
		}
		
		
		if ($this->plugin_settings('mode') == "certification") 
		{
 			echo "Auth/Decline Code: ". @$transaction->NewOrderResp->AuthCode. '<br /> '; 
			echo "Resp Code: ". @$transaction->NewOrderResp->RespCode. '<br /> '; 
			echo "AVS Resp: ". @$transaction->NewOrderResp->AVSRespCode. '<br /> '; 
			echo "CVD Resp: ". @$transaction->NewOrderResp->CVV2RespCode. '<br /> '; 
			echo "TxRefNum: ". @$transaction->NewOrderResp->TxRefNum. '<br /> '; 
			
			echo "<pre>";
			print_r($transaction); 
			echo "</pre>";
			exit;
		}
		
		
		
		if((string)  $transaction->NewOrderResp->ProcStatus=="0" && (string) $transaction->NewOrderResp->ApprovalStatus ==1)
		{
			$resp['authorized']	 	= TRUE; 
			$resp['declined'] 		= FALSE; 
			$resp['transaction_id']	= (string) $transaction->NewOrderResp->TxRefNum;
			$resp['failed']			= FALSE; 
			$resp['error_message']	= "";
		}
		else
		{
			$resp['authorized']	 	= FALSE; 
			$resp['declined'] 		= FALSE; 
			$resp['transaction_id']	= NULL;
			$resp['failed']			= TRUE; 
			$resp['error_message']	= (string) $transaction->NewOrderResp->StatusMsg;
		}
		
		return $resp; 
 
 	}
 }
?>