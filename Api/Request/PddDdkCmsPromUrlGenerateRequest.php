<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddDdkCmsPromUrlGenerateRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(Boolean, "generate_short_url")
     */
    private $generateShortUrl;

    /**
     * @JsonProperty(Boolean, "generate_mobile")
     */
    private $generateMobile;

    /**
     * @JsonProperty(Boolean, "multi_group")
     */
    private $multiGroup;

    /**
     * @JsonProperty(String, "custom_parameters")
     */
    private $customParameters;

    /**
     * @JsonProperty(Boolean, "generate_weapp_webview")
     */
    private $generateWeappWebview;

    /**
     * @JsonProperty(Boolean, "we_app_web_view_short_url")
     */
    private $weAppWebViewShortUrl;

    /**
     * @JsonProperty(Boolean, "we_app_web_view_url")
     */
    private $weAppWebViewUrl;

    /**
     * @JsonProperty(Integer, "channel_type")
     */
    private $channelType;

    /**
     * @JsonProperty(List<String>, "p_id_list")
     */
    private $pIdList;

    /**
     * @JsonProperty(Boolean, "generate_schema_url")
     */
    private $generateSchemaUrl;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "generate_short_url", $this->generateShortUrl);
        $this->setUserParam($params, "generate_mobile", $this->generateMobile);
        $this->setUserParam($params, "multi_group", $this->multiGroup);
        $this->setUserParam($params, "custom_parameters", $this->customParameters);
        $this->setUserParam($params, "generate_weapp_webview", $this->generateWeappWebview);
        $this->setUserParam($params, "we_app_web_view_short_url", $this->weAppWebViewShortUrl);
        $this->setUserParam($params, "we_app_web_view_url", $this->weAppWebViewUrl);
        $this->setUserParam($params, "channel_type", $this->channelType);
        $this->setUserParam($params, "p_id_list", $this->pIdList);
        $this->setUserParam($params, "generate_schema_url", $this->generateSchemaUrl);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.ddk.cms.prom.url.generate";
    }

    public function setGenerateShortUrl($generateShortUrl){
        $this->generateShortUrl = $generateShortUrl;
    }

    public function setGenerateMobile($generateMobile){
        $this->generateMobile = $generateMobile;
    }

    public function setMultiGroup($multiGroup){
        $this->multiGroup = $multiGroup;
    }

    public function setCustomParameters($customParameters){
        $this->customParameters = $customParameters;
    }

    public function setGenerateWeappWebview($generateWeappWebview){
        $this->generateWeappWebview = $generateWeappWebview;
    }

    public function setWeAppWebViewShortUrl($weAppWebViewShortUrl){
        $this->weAppWebViewShortUrl = $weAppWebViewShortUrl;
    }

    public function setWeAppWebViewUrl($weAppWebViewUrl){
        $this->weAppWebViewUrl = $weAppWebViewUrl;
    }

    public function setChannelType($channelType){
        $this->channelType = $channelType;
    }

    public function setPIdList($pIdList){
        $this->pIdList = $pIdList;
    }

    public function setGenerateSchemaUrl($generateSchemaUrl){
        $this->generateSchemaUrl = $generateSchemaUrl;
    }

}
