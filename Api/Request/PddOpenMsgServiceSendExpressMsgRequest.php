<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddOpenMsgServiceSendExpressMsgRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(String, "sign_name")
     */
    private $signName;

    /**
     * @JsonProperty(Long, "template_code")
     */
    private $templateCode;

    /**
     * @JsonProperty(List<\pdd\Api\Request\PddOpenMsgServiceSendExpressMsgRequest_Map<String, String>>, "template_param_json")
     */
    private $templateParamJson;

    /**
     * @JsonProperty(List<String>, "waybill_codes")
     */
    private $waybillCodes;

    /**
     * @JsonProperty(String, "wp_code")
     */
    private $wpCode;

    /**
     * @JsonProperty(String, "out_id")
     */
    private $outId;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "sign_name", $this->signName);
        $this->setUserParam($params, "template_code", $this->templateCode);
        $this->setUserParam($params, "template_param_json", $this->templateParamJson);
        $this->setUserParam($params, "waybill_codes", $this->waybillCodes);
        $this->setUserParam($params, "wp_code", $this->wpCode);
        $this->setUserParam($params, "out_id", $this->outId);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.open.msg.service.send.express.msg";
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

    public function setWaybillCodes($waybillCodes){
        $this->waybillCodes = $waybillCodes;
    }

    public function setWpCode($wpCode){
        $this->wpCode = $wpCode;
    }

    public function setOutId($outId){
        $this->outId = $outId;
    }

}
