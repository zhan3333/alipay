<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/2/28
 * Time: 16:38
 */

namespace Payment\Common;


class AliConfig extends ConfigInterface
{
    // 支付宝的网关
    public $getewayUrl = 'https://openapi.alipay.com/gateway.do';

    // 采用的编码
    public $inputCharset = 'UTF-8';

    // 合作者身份ID
    public $partner;

    // 用于异步通知的地址
    public $notifyUrl;

    // 用于同步通知的地址
    public $returnUrl;

    // 订单在支付宝服务器过期的时间，过期后无法支付
    public $timeExpire;

    // 用于rsa加密的私钥文件路径
    public $rsaPrivatePath;

    // 用于rsa加密的私钥一行字符串
    public $rsaPrivateKey;

    // 用于rsa解密的支付宝公钥文件路径
    public $rsaAliPubPath;

    // 用户rsa解密的支付宝公钥一行字符串
    public $rsaAliPubKey;

    // 加密方式 默认使用RSA
    public $signType = 'RSA';

    // 	支付宝分配给开发者的应用ID
    public $appId;

    // 仅支持JSON
    public $format = 'JSON';

    /**
     * AliConfig constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        if (is_array($config)) {
            foreach ($config as $key => $item) {
                $this->{$key} = $item;
            }
        }
    }
}