<?php
/* * 
 * 功能：Bmob支付跳转同步通知页面
 * 版本：1.0
 * 日期：2015-10-29
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究Bmob支付接口使用，只是提供一个参考。
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码

	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
	//获取Bmob的通知返回参数，可参考Bmob文档中页面跳转同步通知参数列表

	//商户订单号
	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号
	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];

	
	//file_put_contents('./return.log', var_export($_GET, true), FILE_APPEND);

	if($_GET['trade_status'] == 1) {
		//判断该笔订单是否在商户网站中已经做过处理
		//如果没有做过处理，根据订单号（out_trade_no）使用Bmob的订单查询接口查到该笔订单的详细，并执行商户的业务程序
		//如果有做过处理，不执行商户的业务程序
	}
	else {
	  echo "trade_status=".$_GET['trade_status'];
	}
	
	echo "验证成功<br />";

//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
?>
        <title>Bmob支付接口</title>
	</head>
    <body>
    </body>
</html>
