<?php
/**
 * 示例接口名称：pdd.ddk.oauth.rp.prom.url.generate
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use pdd\Api\Request\PddDdkOauthRpPromUrlGenerateRequest;
use pdd\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkOauthRpPromUrlGenerateRequest();

$request->setChannelType(1);
$request->setCustomParameters('str');
$request->setGenerateQqApp(true);
$request->setGenerateSchemaUrl(true);
$request->setGenerateShortUrl(true);
$request->setGenerateWeappWebview(true);
$request->setGenerateWeApp(true);
$request->setPIdList(['str']);
$request->setWeAppWebViewShortUrl(true);
$request->setWeAppWebWiewUrl(true);
$request->setDiyLotteryParam();
$request->setDiyRedPacketParam();
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