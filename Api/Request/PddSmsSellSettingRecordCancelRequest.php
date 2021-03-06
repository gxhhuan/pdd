<?php

namespace Com\Pdd\Pop\Sdk\Api\Request;

use Com\Pdd\Pop\Sdk\PopBaseHttpRequest;

class PddSmsSellSettingRecordCancelRequest extends PopBaseHttpRequest{
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
        return "pdd.sms.sell.setting.record.cancel";
    }

    public function setId($id){
        $this->id = $id;
    }

}
