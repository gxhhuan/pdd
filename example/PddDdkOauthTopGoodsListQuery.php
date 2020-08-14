<?php
/**
 * 示例接口名称：pdd.ddk.oauth.top.goods.list.query
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\Api\Request\PddDdkOauthTopGoodsListQueryRequest;
use Com\Pdd\Pop\Sdk\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkOauthTopGoodsListQueryRequest();

$request->setPId('str');
$request->setOffset(1);
$request->setSortType(1);
$request->setLimit(1);
try{
    $response = $client->syncInvoke($request, Config::$accessToken);
}catch(Com\Pdd\Pop\Sdk\PopHttpException $e){
    echo $e->getMessage();
    exit;
}
$content = $response->getContent();
if(isset($content['error_response'])){
    echo "异常返回";
}
echo json_encode($content, JSON_UNESCAPED_UNICODE);