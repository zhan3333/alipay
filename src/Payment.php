<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/2/28
 * Time: 16:47
 */

namespace Payment;

use Payment\api\AopClient;
use Payment\api\request\AlipayTradeAppPayRequest;
use Payment\Common\AliConfig;
use Payment\Common\AliPayBizContent;

class Payment
{
    // 异步通知地址
    public $notifyUrl;

    /**
     * 支付对象
     * @var AopClient
     */
    public $aop;

    public function __construct(array $config)
    {
        $AliConfig = new AliConfig($config);
        $aop = new AopClient();
        $this->initConfig($aop, $AliConfig);
        $this->aop = $aop;
    }

    public function initConfig(AopClient $aop, AliConfig $AliConfig)
    {
        $aop->gatewayUrl = $AliConfig->getewayUrl;
        $aop->appId = $AliConfig->appId;
        $aop->rsaPrivateKey = $AliConfig->rsaPrivateKey;
        $aop->alipayPublicKey = $AliConfig->rsaAliPubKey;
        $aop->format = $AliConfig->format;
        $aop->charset = $AliConfig->inputCharset;
        $aop->signType = $AliConfig->signType;
        $this->notifyUrl = $AliConfig->notifyUrl;
    }

    /**
     * 设置支付宝支付异步通知地址
     * @param $notifyUrl
     */
    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = $notifyUrl;
    }

    /**
     * 获取支付订单
     * @param AliPayBizContent $bizcontent
     * @return string 返回订单字符串
     */
    public function getPayOrder($bizcontent)
    {
        $request = new AlipayTradeAppPayRequest();
        $request->setNotifyUrl($this->notifyUrl);
        $request->setBizContent((string)$bizcontent);
        return $this->aop->sdkExecute($request);
    }
}