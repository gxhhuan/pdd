<?php
/**
 * 示例接口名称：pdd.ddk.oauth.theme.prom.url.generate
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\Api\Request\PddDdkOauthThemePromUrlGenerateRequest;
use Com\Pdd\Pop\Sdk\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkOauthThemePromUrlGenerateRequest();

$request->setPid('str');
$request->setThemeIdList([1]);
$request->setGenerateShortUrl(true);
$request->setGenerateMobile(true);
$request->setCustomParameters('str');
$request->setGenerateWeappWebview(true);
$request->setWeAppWebViewShortUrl(true);
$request->setWeAppWebWiewUrl(true);
$request->setGenerateSchemaUrl(true);
$request->setGenerateQqApp(true);
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