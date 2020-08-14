<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddSmsShortStatisticQueryRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(Long, "setting_id")
     */
    private $settingId;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "setting_id", $this->settingId);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.sms.short.statistic.query";
    }

    public function setSettingId($settingId){
        $this->settingId = $settingId;
    }

}
