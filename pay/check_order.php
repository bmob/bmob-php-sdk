<?php
/* * 
 * 功能：查询订单的信息
 * 版本：1.0
 * 日期：2017-11-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究Bmob支付接口使用，只是提供一个参考。
 */
include_once '../lib/BmobPay.class.php';

$tradeNo = $_GET['tradeNo'];
$bmobPay = new BmobPay();
$res = $bmobPay->getOrder($tradeNo);

//trade_state:NOTPAY（未支付）或 SUCCESS（支付成功）
echo $res->trade_state;
	

		
