<?php
/**
 * 示例接口名称：pdd.ddk.weapp.qrcode.url.gen
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use pdd\Api\Request\PddDdkWeappQrcodeUrlGenRequest;
use pdd\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkWeappQrcodeUrlGenRequest();

$request->setPId('str');
$request->setGoodsIdList([1]);
$request->setCustomParameters('str');
$request->setZsDuoId(1);
$request->setGenerateMallCollectCoupon(true);
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