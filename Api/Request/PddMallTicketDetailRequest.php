<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddMallTicketDetailRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(String, "ticket_id")
     */
    private $ticketId;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "ticket_id", $this->ticketId);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.mall.ticket.detail";
    }

    public function setTicketId($ticketId){
        $this->ticketId = $ticketId;
    }

}
