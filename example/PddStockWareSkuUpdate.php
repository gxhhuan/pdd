<?php
/**
 * 示例接口名称：pdd.stock.ware.sku.update
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use pdd\Api\Request\PddStockWareSkuUpdateRequest;
use pdd\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddStockWareSkuUpdateRequest();

$request->setWareId(1);
$request->setWareSkus();
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