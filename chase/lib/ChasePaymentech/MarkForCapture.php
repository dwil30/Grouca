<?php
/**
 * ChasePaymentech_MarkForCapture
 * 
 * @author Routy Development LLC.
 * @copyright (c) 2012-2013 Routy Development LLC.
 * @package Chase Paymentech
 * @link http://http://download.chasepaymentech.com/docs/orbital/orbital_gateway_xml_specification.pdf XML API Docs
 */
class ChasePaymentech_MarkForCapture extends ChasePaymentech_Request {

    protected $_available_fields = array(
        'OrderID', 'Amount', 'TaxInd', 'Tax', 'TxRefNum', 'PCOrderNum',
        'PCDestZip','PCDestName', 'PCDestAddress1', 'PCDestAddress2', 
        'PCDestCity', 'PCDestState', 'AMEXTranAdvAddn1', 'AMEXTranAdvAddn2',
        'AMEXTranAdvAddn3', 'AMEXTranAdvAddn4', 'PC3FreightAmt', 'PC3DutyAmt', 
        'PC3DestCountryCd', 'PC3ShipFromZip', 'PC3DiscAmt', 'PC3VATtaxAmt',
        'PC3AltTaxID', 'PC3AltTaxAmt', 'PC3LineItemCount', 'PC3LineItemArray',
        'PC3LineItem', 'PC3DtlIndex', 'PC3DtlDesc', 'PC3DtlProdCd',
        'PC3DtlQty', 'PC3DtlUOM', 'PC3DtlTaxAmt', 'PC3DtlTaxRate',
        'PC3Dtllinetot', 'PC3DtlDisc', 'PC3DtlCommCd', 'PC3DtlUnitCost',
        'PC3DtlGrossNet', 'PC3DtlTaxType', 'PC3DtlDiscInd', 'PC3DtlDebitInd',
        'PC3DtlDiscountRate'
    );
    
    protected $_required_fields = array(
        'OrderID', 'TxRefNum'
    );
    
    public function capture() {
        
        $xml = $this->_setRequest();
        
        $this->_request_xml = $xml;
        
        return $this->_sendRequest();
    }

    private function _setRequest(){
        
        $xml = new SimpleXMLElement('<Request><MarkForCapture></MarkForCapture></Request>');
        $xml_order = $xml->MarkForCapture;
        
        $xml_order->OrbitalConnectionUsername = $this->_username;
        $xml_order->OrbitalConnectionPassword = $this->_password;
        $xml_order->OrderID = null;
        $xml_order->Amount = null;
        $xml_order->BIN = $this->_bin;
        $xml_order->MerchantID = $this->_merchant_id;
        $xml_order->TerminalID = $this->_terminal_id;
        $xml_order->TxRefNum = null;
        
        foreach($this->_available_fields as $field){
            if(isset($this->_fields[$field]) && !empty($this->_fields[$field])){
                $xml_order->$field = $this->_fields[$field];
            }
        }

        $this->_request_xml = $xml;
        
        return $xml;
        
    }
    
    protected function _handleResponse($response) {

        return $this->_response = new ChasePaymentech_MarkForCapture_Response($response);
        
    }

}

/**
 * ChasePaymentech_MarkForCapture_Response
 * 
 * @author Routy Development LLC.
 * @copyright (c) 2012-2013 Routy Development LLC.
 * @package Chase Paymentech
 * @link http://http://download.chasepaymentech.com/docs/orbital/orbital_gateway_xml_specification.pdf XML API Docs
 */
class ChasePaymentech_MarkForCapture_Response extends ChasePaymentech_Response {
    
    public function __construct($response){
    
        $this->response = $response;
        
        if($response){
        
            try {

                $xml = new SimpleXMLElement($response);

            } catch(Exception $e){

                $this->approved = false;
                $this->declined = false;
                $this->error = true;
                $this->StatusMsg = 'Invalid response received. Unable to parse XML response.';
                return;
                
            }

            if($xml->MarkForCaptureResp){
            
                if($xml->MarkForCaptureResp->ProcStatus == '0'){
                
                    $xml_resp = $xml->MarkForCaptureResp;

                    $this->approved = ($xml_resp->ApprovalStatus == self::APPROVED);
                    $this->declined = ($xml_resp->ApprovalStatus == self::DECLINED);
                    $this->error    = ($xml_resp->ApprovalStatus == self::ERROR);

                    $this->ApprovalStatus = $xml_resp->ApprovalStatus;
                    $this->ProcStatus = $xml_resp->ProcStatus;
                    $this->RespCode = $xml_resp->RespCode;
                    $this->AVSRespCode = $xml_resp->AVSRespCode;
                    $this->CVV2RespCode = $xml_resp->CVV2RespCode;
                    $this->TxRefNum = $xml_resp->TxRefNum;
                    $this->TxRefIdx = $xml_resp->TxRefIdx;
                    $this->Amount = $xml_resp->Amount;
                    $this->AuthCode = $xml_resp->AuthCode;
                    $this->StatusMsg = $xml_resp->StatusMsg;
                    $this->RespMsg = $xml_resp->RespMsg;
                    $this->HostRespCode = $xml_resp->HostRespCode;
                    $this->RespTime = $xml_resp->RespTime;
                    $this->HostAVSRespCode = $xml_resp->HostAVSRespCode;
                    $this->HostCVV2RespCode = $xml_resp->HostCVV2RespCode;
                    
                } else {
                    
                    $this->approved = false;
                    $this->declined = false;
                    $this->error = true;
                    $this->StatusMsg = 'Gateway rejected request. Gateway responded with message: '.$xml_resp->StatusMsg;
                    return;
                    
                }
                
            } else {
                
                $this->approved = false;
                $this->declined = false;
                $this->error = true;
                $this->StatusMsg = 'Invalid XML received.';
                return;
                
            }
        
        } else {
            
            $this->approved = false;
            $this->declined = false;
            $this->error = true;
            $this->StatusMsg = 'Unable to connect to Chase Paymentech.';
            
        }
    }
}

?>
