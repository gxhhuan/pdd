<?php
/**
 * 示例接口名称：pdd.ddk.oauth.goods.zs.unit.url.gen
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use pdd\Api\Request\PddDdkOauthGoodsZsUnitUrlGenRequest;
use pdd\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkOauthGoodsZsUnitUrlGenRequest();

$request->setSourceUrl('str');
$request->setPid('str');
$request->setGenerateSchemaUrl('str');
try{
    $response = $client->syncInvoke($request, Config::$accessToken);
}catch(pdd\PopHttpException $e){
    echo $e->getMessage();
    exit;
}
$content = $response->getContent();
if(isset($content['error_response'])){
    echo "异常返回";
}
echo json_encode($content, JSON_UNESCAPED_UNICODE);