<?php
/**
 * ChasePaymentech_Response
 * 
 * @author Routy Development LLC.
 * @copyright (c) 2012-2013 Routy Development LLC.
 * @package Chase Paymentech
 * @link http://http://download.chasepaymentech.com/docs/orbital/orbital_gateway_xml_specification.pdf XML API Docs
 */
abstract class ChasePaymentech_Response {
    
    const APPROVED = 1;
    const DECLINED = 0;
    const ERROR    = 2;
    
    public $approved;
    public $declined;
    public $error;
    public $ProcStatus;
    public $RespCode;
    public $ApprovalStatus;
    public $response;
    
}

?>
