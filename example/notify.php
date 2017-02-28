<?php
/**
 * 接受支付宝app支付异步回调数据
 */
require '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__ . '/log/notify.log'));

/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/2/28
 * Time: 15:51
 */
$aop = new \Payment\api\AopClient();
$aop->alipayrsaPublicKey = file_get_contents(__DIR__ . '/key/ali_pay_rsa_public_key');
$log->debug('11', []);
$flag = $aop->rsaCheckV2($_POST, null, 'RSA2'); // 签名验证
$log->debug('post data', ['flag' => $flag, 'POST' => $_POST]);
