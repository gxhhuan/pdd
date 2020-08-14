<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddOpenMsgServiceSendMsgRequest extends PopBaseHttpRequest{
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
     * @JsonProperty(List<\pdd\Api\Request\PddOpenMsgServiceSendMsgRequest_tring, String>, "template_param")
     */
    private $templateParam;

    /**
     * @JsonProperty(String, "out_id")
     */
    private $outId;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "phone_numbers", $this->phoneNumbers);
        $this->setUserParam($params, "sign_name", $this->signName);
        $this->setUserParam($params, "template_code", $this->templateCode);
        $this->setUserParam($params, "template_param", $this->templateParam);
        $this->setUserParam($params, "out_id", $this->outId);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.open.msg.service.send.msg";
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

    public function setTemplateParam($templateParam){
        $this->templateParam = $templateParam;
    }

    public function setOutId($outId){
        $this->outId = $outId;
    }

}
