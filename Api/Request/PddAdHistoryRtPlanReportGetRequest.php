<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddAdHistoryRtPlanReportGetRequest extends PopBaseHttpRequest{
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
        return "pdd.ad.history.rt.plan.report.get";
    }

    public function setSceneType($sceneType){
        $this->sceneType = $sceneType;
    }

}
