<?php
/**
 * 示例接口名称：pdd.voucher.voucher.complain
 */
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use pdd\Api\Request\PddVoucherVoucherComplainRequest;
use pdd\PopHttpClient;

$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddVoucherVoucherComplainRequest();

$request->setOrderSn('str');
$request->setOutBizNo('str');
$request->setVoucherList();
$request->setComplainUser('str');
$request->setComplainUserMobile('str');
$request->setComplainContent('str');
$request->setComplainAttachmentList(['str']);
$request->setComplainType(1);
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