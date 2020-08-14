<?php

namespace Com\Pdd\Pop\Sdk\Api\Request;

use Com\Pdd\Pop\Sdk\PopBaseHttpRequest;

class PddDdkGoodsBasicInfoGetRequest extends PopBaseHttpRequest{
    public function __construct(){

    }

    /**
     * @JsonProperty(List<Long>, "goods_id_list")
     */
    private $goodsIdList;

    protected function setUserParams(&$params){
        $this->setUserParam($params, "goods_id_list", $this->goodsIdList);

    }

    public function getVersion(){
        return "V1";
    }

    public function getDataType(){
        return "JSON";
    }

    public function getType(){
        return "pdd.ddk.goods.basic.info.get";
    }

    public function setGoodsIdList($goodsIdList){
        $this->goodsIdList = $goodsIdList;
    }

}
