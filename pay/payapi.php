<?php
/* * 
 * 功能：调起Bmob Web支付接口返回的html 填写在该页面
 * 版本：1.0
 * 日期：2015-10-29
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究Bmob支付接口使用，只是提供一个参考。
 */
include_once '../lib/BmobPay.class.php';
?>
<!DOCTYPE HTML>

<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>支付下订单页面</title>
	</head>
    <body>
	<?php
			$bmobPay = new BmobPay();
    		$res = $bmobPay->webPay(0.01, "充值", "给应用充值0.01元");

			//调起Web支付接口，返回的html，输出在此页面中，将自动跳转到支付宝支付页面。
			$html = $res->html;
			echo $html;
		?>
    </body>
</html>