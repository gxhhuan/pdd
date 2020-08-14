<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddStockWareDetailQueryRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(Long, "ware_id")
     */
    private $wareId;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "ware_id", $this->wareId);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.stock.ware.detail.query";
    }

    public function setWareId($wareId){
        $this->wareId = $wareId;
    }

}
