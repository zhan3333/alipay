# 库目的
1. 导入阿里支付宝新版sdk
2. 增加一些配置入口，让配置更简单
3. 添加example示例

# 配置文件
```php
<?php
return [
    // 通用配置
    'signType' => 'RSA2',

    // 配置
    
    // 异步通知地址
//    'notifyUrl' => 'https://local.ykxing.com/zhan/yiyuan/AliPay_notify',
    // 支付宝提供的appId
//    'appId' => '2017021705720667'
    // rsa签名验证的私钥地址
//    'rsaPrivateKey' => file_get_contents(__DIR__ . '/key/rsa_private_key'),
    // 支付宝提供的公钥地址
//    'rsaAliPubPath' => file_get_contents(__DIR__ . '/key/ali_pay_rsa_public_key'),

    // 沙箱配置
    'notifyUrl' => 'https://local.ykxng.com/zhan/zhan/example/notify.php',
    'appId' => '2016080100139922',
    'getewayUrl' => 'https://openapi.alipaydev.com/gateway.do',
    'rsaPrivateKey' => file_get_contents(__DIR__ . '/sandboxKey/rsa_private_key'),
    'rsaAliPubPath' => file_get_contents(__DIR__ . '/sandboxKey/ali_pay_rsa_public_key'),
];
```

# 创建订单
```
<?php
require_once '../vendor/autoload.php';

$aliConfig = require_once 'alipayConfig.php';           // 配置文件
$payment = new \Payment\Payment($aliConfig);            // 获取payment对象
$bizcontent = new \Payment\Common\AliPayBizContent([    // 设置一些订单属性
    'out_trade_no' => (string)time(),
    'total_amount' => '0.01',
    'subject' => '测试商品',
    'timeout_express' => '30m',
    'body' => '我是测试数据'
]);
$order = $payment->getPayOrder($bizcontent);        // 获取订单信息返回前端
echo $order;
```

# 接收支付宝异步回调数据
```php
<?php
require '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__ . '/log/notify.log'));

$aop = new \Payment\api\AopClient();
$aop->alipayrsaPublicKey = file_get_contents(__DIR__ . '/key/ali_pay_rsa_public_key');
$log->debug('11', []);
$flag = $aop->rsaCheckV2($_POST, null, 'RSA2'); // 签名验证
$log->debug('post data', ['flag' => $flag, 'POST' => $_POST]);
```