<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/2/28
 * Time: 17:01
 */

namespace Payment\Common;


class AliPayBizContent
{
    // 非必填，对交易的描述
    public $body;

    // 必填，订单标题
    public $subject;

    // 必填，商户网站唯一订单号
    public $out_trade_no;

    // 非必填，订单超时关闭时间
    public $timeout_express;

    // 必填，订单总金额，单位为元，范围为[0.01,100000000]
    public $total_amount;

    // 非必填，收款支付宝用户id
    public $seller_id;

    // 必填，销售产品码，上架和支付宝签约的产品码，为固定值
    public $product_code = 'QUICK_MSECURITY_PAY';

    // 非必填，商品主类型
    public $goods_type;

    // 非必填，公用回传参数，如果请求时传递了该参数，则返回给商户时会回传该参数。
    public $passback_params;

    public function __construct(array $config)
    {
        if (is_array($config)) {
            foreach ($config as $key => $item) {
                $this->{$key} = $item;
            }
        }
    }


    public function __toString()
    {
        $data = (array)$this;
        $str = "{";
        foreach ($data as $key => $value) {
            if (!empty($value)) $str .= "\"{$key}\":\"{$value}\",";
        }
        $str = substr($str, 0, strlen($str) - 1);
        $str .= '}';
        return $str;
    }
}