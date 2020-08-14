<?php
/**
 * 示例接口名称：pdd.sms.send.record.list.query
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use pdd\Api\Request\PddSmsSendRecordListQueryRequest;
use pdd\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddSmsSendRecordListQueryRequest();

$request->setScene([1]);
$request->setStartTime('str');
$request->setEndTime('str');
$request->setStatus(1);
$request->setPageNumber(1);
$request->setPageSize(1);
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