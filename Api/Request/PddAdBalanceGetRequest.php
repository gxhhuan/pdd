<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddAdBalanceGetRequest extends PopBaseHttpRequest{
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
        return "pdd.ad.balance.get";
    }

}
