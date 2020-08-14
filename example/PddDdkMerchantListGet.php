<?php
/**
 * 示例接口名称：pdd.ddk.merchant.list.get
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use pdd\Api\Request\PddDdkMerchantListGetRequest;
use pdd\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkMerchantListGetRequest();

$request->setCatId(1);
$request->setHasCltCpn(true);
$request->setHasCoupon(1);
$request->setMallIdList([1]);
$request->setMerchantTypeList([1]);
$request->setPageNumber(1);
$request->setPageSize(1);
$request->setQueryRangeStr(1);
$request->setRangeVoList('str');
try{
    $response = $client->syncInvoke($request);
}catch(pdd\PopHttpException $e){
    echo $e->getMessage();
    exit;
}
$content = $response->getContent();
if(isset($content['error_response'])){
    echo "异常返回";
}
echo json_encode($content, JSON_UNESCAPED_UNICODE);