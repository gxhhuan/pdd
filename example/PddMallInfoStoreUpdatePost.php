<?php
/**
 * 示例接口名称：pdd.mall.info.store.update.post
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use pdd\Api\Request\PddMallInfoStoreUpdatePostRequest;
use pdd\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddMallInfoStoreUpdatePostRequest();

$request->setBusinessStatus(1);
$request->setBusinessWeekList([1]);
$request->setCity('str');
$request->setDistrict('str');
$request->setEndBusinessHour('str');
$request->setPoiId('str');
$request->setPoiLatitude();
$request->setPoiLongitude();
$request->setProvince('str');
$request->setStartBusinessHour('str');
$request->setStoreAddress('str');
$request->setStoreId(1);
$request->setStoreName('str');
$request->setStoreNumber('str');
$request->setStorePhone('str');
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