<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddOpenMsgServiceSendBatchMsgRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(List<String>, "phone_numbers")
     */
    private $phoneNumbers;

    /**
     * @JsonProperty(String, "sign_name")
     */
    private $signName;

    /**
     * @JsonProperty(Long, "template_code")
     */
    private $templateCode;

    /**
     * @JsonProperty(List<\pdd\Api\Request\PddOpenMsgServiceSendBatchMsgRequest_Map<String, String>>, "template_param_json")
     */
    private $templateParamJson;

    /**
     * @JsonProperty(String, "out_id")
     */
    private $outId;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "phone_numbers", $this->phoneNumbers);
        $this->setUserParam($params, "sign_name", $this->signName);
        $this->setUserParam($params, "template_code", $this->templateCode);
        $this->setUserParam($params, "template_param_json", $this->templateParamJson);
        $this->setUserParam($params, "out_id", $this->outId);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.open.msg.service.send.batch.msg";
    }

    public function setPhoneNumbers($phoneNumbers){
        $this->phoneNumbers = $phoneNumbers;
    }

    public function setSignName($signName){
        $this->signName = $signName;
    }

    public function setTemplateCode($templateCode){
        $this->templateCode = $templateCode;
    }

    public function setTemplateParamJson($templateParamJson){
        $this->templateParamJson = $templateParamJson;
    }

    public function setOutId($outId){
        $this->outId = $outId;
    }

}
