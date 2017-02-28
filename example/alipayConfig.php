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
    'rsaPrivateKey' => file_get_contents(__DIR__ . '/key/rsa_private_key'),
    'rsaAliPubPath' => file_get_contents(__DIR__ . '/key/ali_pay_rsa_public_key'),
    'signType' => 'RSA2',
    'appId' => '2017021705720667'
];