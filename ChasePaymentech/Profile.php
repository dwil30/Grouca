<?php

/**
 * ChasePaymentech_Profile
 * 
 * @author Routy Development LLC.
 * @copyright (c) 2012-2013 Routy Development LLC.
 * @package Chase Paymentech
 * @link http://http://download.chasepaymentech.com/docs/orbital/orbital_gateway_xml_specification.pdf XML API Docs
 * 
 */
class ChasePaymentech_Profile extends ChasePaymentech_Request {
    
    protected $_available_fields = array(
        'CustomerName','CustomerRefNum','CustomerAddress1','CustomerAddress2','CustomerCity',
        'CustomerState','CustomerZIP','CustomerEmail','CustomerPhone','CustomerCountryCode',
        'CustomerProfileAction','CustomerProfileOrderOverrideInd','CustomerProfileFromOrderInd',
        'OrderDefaultDescription','OrderDefaultAmount','CustomerAccountType','Status',
        'CustomerProfileFromOrderInd','CustomerRefNum','CustomerProfileOrderOverrideInd',
        'Status','CCAccountNum','CCExpireDate','MBType','MBOrderIdGenerationMethod',
        'MBRecurringStartDate','MBRecurringEndDate','MBRecurringNoEndDateFlag','MBRecurringMaxBillings',
        'MBRecurringFrequency','MBDeferredBillDate','MBCancelDate','MBRestoreBillingDate',
        'MBRemoveFlag','AccountUpdaterEligibility'   
    );
    
    public function profileRequest() {
        
        $xml = $this->_setRequest();
        
        $xml_order = $xml->Profile;

        $this->_request_xml = $xml;
        
        return $this->_sendRequest();
    }
    

    private function _setRequest(){
        
        $xml = new SimpleXMLElement('<Request><Profile></Profile></Request>');
        $xml_order = $xml->Profile;
        
        $xml_order->OrbitalConnectionUsername = $this->_username;
        $xml_order->OrbitalConnectionPassword = $this->_password;
        $xml_order->CustomerBin = $this->_bin;
        $xml_order->CustomerMerchantID = $this->_merchant_id;
        
        foreach($this->_available_fields as $field){
            if(isset($this->_fields[$field]) && !empty($this->_fields[$field])){
                $xml_order->$field = $this->_fields[$field];
            }
        }

        $this->_request_xml = $xml;
        
        return $xml;
        
    }
    
    protected function _handleResponse($response) {

        return $this->_response = new ChasePaymentech_Profile_Response($response);
        
    }
    
}

/**
 * ChasePaymentech_Profile_Response
 * 
 * @author Routy Development LLC.
 * @copyright (c) 2012-2013 Routy Development LLC.
 * @package Chase Paymentech
 * @link http://http://download.chasepaymentech.com/docs/orbital/orbital_gateway_xml_specification.pdf XML API Docs
 * 
 */
class ChasePaymentech_Profile_Response extends ChasePaymentech_Response{
    
    public function __construct($response){
    
        $this->response = $response;
        
        if($response){
        
            try {

                $xml = new SimpleXMLElement($response);

            } catch(Exception $e){

                $this->success = false;
                $this->error = true;
                $this->error_message = 'Invalid response received.';
                return;
                
            }

            if($xml->ProfileResp && isset($xml->ProfileResp->ProfileProcStatus)){
            
                
                $xml_resp = $xml->ProfileResp;

                $this->success = ($xml_resp->ProfileProcStatus == 0);
                $this->error    = ($xml_resp->ProfileProcStatus > 0);

                $this->RespCode = $xml_resp->RespCode;
                $this->CustomerProfileMessage = $xml_resp->CustomerProfileMessage;
                $this->CustomerProfileAction = $xml_resp->CustomerProfileAction;


                /*
                 * Profile Specific
                 * 
                 */
                if($xml_resp->CustomerRefNum){
                    $this->CustomerRefNum = $xml_resp->CustomerRefNum;
                }
                
                if($xml_resp->CustomerProfileAction == 'READ'){
                    $this->CustomerProfile->CustomerAddress1 = $xml_resp->CustomerAddress1;
                    $this->CustomerProfile->CustomerAddress2 = $xml_resp->CustomerAddress2;
                    $this->CustomerProfile->CustomerCity = $xml_resp->CustomerCity;
                    $this->CustomerProfile->CustomerState = $xml_resp->CustomerState;
                    $this->CustomerProfile->CustomerZIP = $xml_resp->CustomerZIP;
                    $this->CustomerProfile->CustomerCountryCode = $xml_resp->CustomerCountryCode;
                    $this->CustomerProfile->CustomerEmail = $xml_resp->CustomerEmail;
                    $this->CustomerProfile->CustomerPhone = $xml_resp->CustomerPhone;
                }
                    
                
            } else {
                
                $this->success = false;
                $this->error = true;
                $this->error_message = 'Invalid XML received.';
                return;
                
            }
        
        } else {
            
            $this->success = false;
            $this->error = true;
            $this->error_message = 'Unable to connect to Chase Paymentech.';
            
        }
    }
    
    
}
?>
