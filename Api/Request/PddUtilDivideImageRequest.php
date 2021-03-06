<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddUtilDivideImageRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(String, "image_url")
     */
    private $imageUrl;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "image_url", $this->imageUrl);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.util.divide.image";
    }

    public function setImageUrl($imageUrl){
        $this->imageUrl = $imageUrl;
    }

}
