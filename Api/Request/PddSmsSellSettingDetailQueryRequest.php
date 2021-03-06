<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddSmsSellSettingDetailQueryRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(Long, "id")
     */
    private $id;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "id", $this->id);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.sms.sell.setting.detail.query";
    }

    public function setId($id){
        $this->id = $id;
    }

}
