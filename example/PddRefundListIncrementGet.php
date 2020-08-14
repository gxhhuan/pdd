<?php
/**
 * 示例接口名称：pdd.refund.list.increment.get
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\Api\Request\PddRefundListIncrementGetRequest;
use Com\Pdd\Pop\Sdk\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddRefundListIncrementGetRequest();

$request->setAfterSalesStatus(1);
$request->setAfterSalesType(1);
$request->setEndUpdatedAt(1);
$request->setPage(1);
$request->setPageSize(1);
$request->setStartUpdatedAt(1);
try{
    $response = $client->syncInvoke($request);
}catch(Com\Pdd\Pop\Sdk\PopHttpException $e){
    echo $e->getMessage();
    exit;
}
$content = $response->getContent();
if(isset($content['error_response'])){
    echo "异常返回";
}
echo json_encode($content, JSON_UNESCAPED_UNICODE);