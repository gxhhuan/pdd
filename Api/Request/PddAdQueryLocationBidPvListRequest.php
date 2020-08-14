<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddAdQueryLocationBidPvListRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(Integer, "scene_type")
     */
    private $sceneType;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "scene_type", $this->sceneType);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.ad.query.location.bid.pv.list";
    }

    public function setSceneType($sceneType){
        $this->sceneType = $sceneType;
    }

}
