<?php

namespace Com\Pdd\Pop\Sdk\Api\Request;

use Com\Pdd\Pop\Sdk\PopBaseHttpRequest;

class PddGooodsSkuMeasurementListRequest extends PopBaseHttpRequest{
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
        return "pdd.gooods.sku.measurement.list";
    }

}
