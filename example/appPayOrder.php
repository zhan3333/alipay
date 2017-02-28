<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/2/28
 * Time: 17:11
 */
require_once '../vendor/autoload.php';
require_once 'log.php';

$aliConfig = require_once 'alipayConfig.php';
$payment = new \Payment\Payment($aliConfig);        // 获取payment对象
$bizcontent = new \Payment\Common\AliPayBizContent([    // 设置一些订单属性
    'out_trade_no' => (string)time(),
    'total_amount' => '0.01',
    'subject' => '测试商品',
    'timeout_express' => '30m',
    'body' => '我是测试数据'
]);
$log->debug('bizcontent', [(string)$bizcontent]);
$order = $payment->getPayOrder($bizcontent);        // 获取订单信息返回前端
echo $order;