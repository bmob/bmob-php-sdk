<?php
/* * 
 * 功能：调起weixin扫码支付
 * 版本：1.0
 * 日期：2017-11-23
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
		$res = $bmobPay->webPay(2.2, "充值", "给应用充值2.2元", 2);

		//调起Web支付接口，返回微信的二维码
		$img=$res->qrcode;	

	?>
	<img width="100" height="100" src="data:image/png;base64,<?php echo $img;?>"/>	
	<div style="width: 300px;height: 300px;margin: 0 auto;" id="div_result"></div>	

	<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
	<script type="text/javascript">

	    //查询订单的状态
	    function getStatus(){

	    	//check_order.php是本文件夹下的check_order.php文件，请根据服务器的配置修改这里的url
	        var checkUrl = "http://local.test/bmob-php-sdk/pay/check_order.php?tradeNo=<?php echo $res->tradeNo; ?>";
		    $.ajax({
		        type: 'GET',
		        url: checkUrl,
		        dataType: 'html',
		        success: function (response) {
		           if(response=="SUCCESS"){
		               $("#div_result").html("支付成功");
		               clearInterval(timer1);
		           }
		        }
		    });

	    }

	    var timer1 = window.setInterval(getStatus, 10000);
	</script>


    </body>
</html>