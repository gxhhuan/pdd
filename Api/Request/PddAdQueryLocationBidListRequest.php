<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddAdQueryLocationBidListRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(Integer, "scene_type")
     */
    private $sceneType;

    /**
     * @JsonProperty(Long, "unit_id")
     */
    private $unitId;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "scene_type", $this->sceneType);
        $this->setUserParam($params, "unit_id", $this->unitId);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.ad.query.location.bid.list";
    }

    public function setSceneType($sceneType){
        $this->sceneType = $sceneType;
    }

    public function setUnitId($unitId){
        $this->unitId = $unitId;
    }

}
