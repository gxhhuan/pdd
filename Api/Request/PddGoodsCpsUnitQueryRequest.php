<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddGoodsCpsUnitQueryRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(Long, "goods_id")
     */
    private $goodsId;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "goods_id", $this->goodsId);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.goods.cps.unit.query";
    }

    public function setGoodsId($goodsId){
        $this->goodsId = $goodsId;
    }

}
