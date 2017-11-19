<?php
/* * 
 * 功能：调起qq扫码支付
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

	<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
	<script src="js/jquery.qrcode.js" type="text/javascript"></script>
	<script src="js/qrcode.js" type="text/javascript"></script>
    
	<?php
		$bmobPay = new BmobPay();
		$res = $bmobPay->webPay(2.2, "充值", "给应用充值2.2元", 3);
		// var_dump($res);
	
	?>

	 <div style="width: 300px;height: 300px;margin: 0 auto;" id="div_div"></div>	
	 <div style="width: 300px;height: 300px;margin: 0 auto;" id="div_result"></div>	


	<script type="text/javascript">

	    function utf16to8(str) { //转码
	        var out, i, len, c;
	        out = "";
	        len = str.length;
	        for (i = 0; i < len; i++) {
	            c = str.charCodeAt(i);
	            if ((c >= 0x0001) && (c <= 0x007F)) {
	                out += str.charAt(i);
	            } else if (c > 0x07FF) {
	                out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));
	                out += String.fromCharCode(0x80 | ((c >> 6) & 0x3F));
	                out += String.fromCharCode(0x80 | ((c >> 0) & 0x3F));
	            } else {
	                out += String.fromCharCode(0xC0 | ((c >> 6) & 0x1F));
	                out += String.fromCharCode(0x80 | ((c >> 0) & 0x3F));
	            }
	        }
	        return out;
	    }
	    var url = '<?php echo $res->url; ?>';
	    $("#div_div").qrcode(utf16to8(url));

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