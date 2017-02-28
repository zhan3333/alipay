<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/2/28
 * Time: 17:11
 */
return [
//    'notifyUrl' => 'https://local.ykxng.com/zhan/zhan/example/notify.php',
    'notifyUrl' => 'https://local.ykxing.com/zhan/yiyuan/AliPay_notify',

    'signType' => 'RSA2',
//    'appId' => '2017021705720667'
//    'rsaPrivateKey' => file_get_contents(__DIR__ . '/key/rsa_private_key'),
//    'rsaAliPubPath' => file_get_contents(__DIR__ . '/key/ali_pay_rsa_public_key'),

    // 沙箱配置
    'appId' => '2016080100139922',
    'getewayUrl' => 'https://openapi.alipaydev.com/gateway.do',
    'rsaPrivateKey' => file_get_contents(__DIR__ . '/sandboxKey/rsa_private_key'),
    'rsaAliPubPath' => file_get_contents(__DIR__ . '/sandboxKey/ali_pay_rsa_public_key'),
];