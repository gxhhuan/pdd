<?php
/**
 * 示例接口名称：pdd.ddk.oauth.finance.cpa.query
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\Api\Request\PddDdkOauthFinanceCpaQueryRequest;
use Com\Pdd\Pop\Sdk\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkOauthFinanceCpaQueryRequest();

$request->setDateEnd('str');
$request->setDateStart('str');
$request->setSourceType(1);
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