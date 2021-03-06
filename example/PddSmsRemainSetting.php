<?php
/**
 * 示例接口名称：pdd.sms.remain.setting
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use pdd\Api\Request\PddSmsRemainSettingRequest;
use pdd\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddSmsRemainSettingRequest();

$request->setUnpaidDuration('str');
$request->setTemplateId('str');
$request->setOpen(1);
$request->setScene(1);
$request->setOperateType(1);
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