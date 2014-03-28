PHP Library for Bmob
================

Bmob是BaaS模式的云服务平台，能协助App开发者，以最节省时间的方式，将App加入云端储存的功能。经过两年多的发展，Bmob目前已经有了成熟的BaaS组件，除包括Android/iOS/RestAPI/PHP等的SDK组件，还针对游戏开发，如Cocos2d-x，提供相应的快速开发工具。

本文档是Bmob官方提供的PHP SDK，方便PHP开发人员快速使用Bmob进行后端开发。

#Bmob官方#
[Bmob官方链接地址](http://www.bmob.cn "Bmob官方链接地址") 

[Bmob官方微博地址](http://weibo.com/bmob/ "Bmob官方微博地址") 


![Bmob微信二维码](http://static.bmob.cn/new/images/ewm.jpg)

扫描上面的二维码关注官方动态


安装
=========================

打开BmobConfig.php，填写APPID（后台获取“应用密钥”中的Application ID）和RESTKEY（后台获取“应用密钥”中的REST API Key）相应的值。

### BmobConfig.php ###


    class BmobConfig{
		const APPID = '';       //替换后台"应用密钥"中的Application ID
		const RESTKEY = '';     //后台"应用密钥"中的REST API Key
		const BMOBURL = 'https://api.bmob.cn/1/';   //保持不变

    }


使用方法
=========================

### test.php ###

项目中的文件test.php演示了如何使用bmob提供的php sdk相关的方法。

    <?php
    include_once 'lib/BmobObject.php';
    include_once 'lib/BmobUser.php';
    try {
		/*
		 *  bmobObject 的例子
	 	*/	
		$bmobObj = new bmobObject("GameScore");
		$res=$bmobObj->create(array("score"=>80,"playerName"=>"game")); //添加对象
		$res=$bmobObj->get("bd89c6bce9"); // 获取id为bd89c6bce9的对象
		$res=$bmobObj->get(); //获取所有对象
		$res=$bmobObj->update("bd89c6bce9", array("score"=>60,"playerName"=>"game"));  //更新对象bd89c6bce9, 任何您未指定的key都不会更改,所以您可以只更新对象数据的一个子集
		$res=$bmobObj->delete("bd89c6bce9"); //删除对象bd89c6bce9
		$res=$bmobObj->get("",array('where={"playerName":"game"}','limit=2')); //对象的查询,这里是表示查找playerName为"game"的对象，只返回２个结果
		$res=$bmobObj->increment("bd89c6bce9","score",array(-2)); //id为bd89c6bce9的field score数值减2
		$res=$bmobObj->increment("bd89c6bce9","score",array(2)); //id为bd89c6bce9的field score数值加2
	
		/*
		 *  bmobUser 的例子
		 */	
		$bmobUser = new bmobUser();
		$res = $bmobUser->register(array("username"=>"cooldude117", "password"=>"p_n7!-e8", "phone"=>"415-392-0202", "email"=>"bmobtest111@126.com")); //用户注册, 其中username和password为必填字段
		$res = $bmobUser->login("cooldude117","p_n7!-e8"); //用户登录, 第一个参数为用户名,第二个参数为密码
		$res = $bmobUser->get("415b8fe99a"); // 获取id为415b8fe99a用户的信息
		$res = $bmobUser->get(); // 获取所有用户的信息
		$res = $bmobUser->update("415b8fe99a", "050391db407114d9801c8f2788c6b25a", array("phone"=>"02011111")); // 更新用户的信息
		$res = $bmobUser->requestPasswordReset("bmobtest111@126.com"); // 请求重设密码,前提是用户将email与他们的账户关联起来
		$res = $bmobUser->delete("415b8fe99a", "050391db407114d9801c8f2788c6b25a"); // 删除id为415b8fe99a的用户, 第一参数是用户id, 第二个参数为sessiontoken,在用户登录或注册后获取, 必填
	
		var_dump($res);

    } catch (Exception $e) {
		echo $e;
    }

