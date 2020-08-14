<?php

namespace Com\Pdd\Pop\Sdk\Api\Request;

use Com\Pdd\Pop\Sdk\PopBaseHttpRequest;

class PddMallInfoBondedWarehouseGetRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    protected function setUserParams(&$params){

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.mall.info.bonded.warehouse.get";
    }

}
