<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddOrderStatusGetRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(String, "order_sns")
     */
    private $orderSns;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "order_sns", $this->orderSns);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.order.status.get";
    }

    public function setOrderSns($orderSns){
        $this->orderSns = $orderSns;
    }

}
