<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddInvoiceDetailInvalidRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(String, "order_sn")
     */
    private $orderSn;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "order_sn", $this->orderSn);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.invoice.detail.invalid";
    }

    public function setOrderSn($orderSn){
        $this->orderSn = $orderSn;
    }

}
