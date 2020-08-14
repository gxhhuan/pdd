<?php

namespace pdd\Api\Request;

use pdd\PopBaseHttpRequest;

class PddGoodsDetailGetRequest extends PopBaseHttpRequest{
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
        return "pdd.goods.detail.get";
    }

    public function setGoodsId($goodsId){
        $this->goodsId = $goodsId;
    }

}
