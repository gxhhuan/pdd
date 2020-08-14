<?php
/**
 * 示例接口名称：pdd.voucher.appointment.info.send
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use pdd\Api\Request\PddVoucherAppointmentInfoSendRequest;
use pdd\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddVoucherAppointmentInfoSendRequest();

$request->setOrderSn('str');
$request->setOutBizNo('str');
$request->setVoucherList();
$request->setLogisticsType(1);
$request->setAppointmentTime(1);
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