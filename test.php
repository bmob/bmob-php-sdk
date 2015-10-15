<?php
include_once 'lib/BmobObject.class.php';
include_once 'lib/BmobUser.class.php';

try {
	
	/*
	 *  bmobObject 的例子
	 */	
	$bmobObj = new BmobObject("GameScore");
	// $res=$bmobObj->create(array("playerName"=>"game","score"=>20)); //添加对象
	// $res=$bmobObj->get("bd89c6bce9"); // 获取id为bd89c6bce9的对象
	// $res=$bmobObj->get(); // 获取所有对象
	// $res=$bmobObj->update("bd89c6bce9", array("score"=>60,"playerName"=>"game")); //更新对象bd89c6bce9, 任何您未指定的key都不会更改,所以您可以只更新对象数据的一个子集
	// $res=$bmobObj->delete("bd89c6bce9"); //删除对象bd89c6bce9
	// $res=$bmobObj->get("",array('where={"playerName":"game"}','limit=2')); //对象的查询,这里是表示查找playerName为"game"的对象，只返回２个结果
	// $res=$bmobObj->increment("bd89c6bce9","score",array(-2)); //id为bd89c6bce9的field score数值减2
	// $res=$bmobObj->increment("bd89c6bce9","score",array(2)); //id为bd89c6bce9的field score数值加2
	// $res=$bmobObj->deleteField("ZS5wHHHV","score"); //在一个对象中删除一个字段
	// $res=$bmobObj->addArray("list",array("person1","person2")); //在对象字段list中添加数组数据
	// $res=$bmobObj->updateArray("ZS5wHHHV","list",array("person3","person2")); //修改对象id为"ZS5wHHHV"中数组字段list的数组
	// $res=$bmobObj->deleteArray("ZS5wHHHV","list",array("person3","person2")); //删除对象id为"ZS5wHHHV"中数组字段list的数组

	//数据关联
	//添加关联关系

	//在字段添加一行记录并在game添加一个关联关系，指向Game对象,　其id为Vn7r999S
	// $res=$bmobObj->addRelPointer("game","Game","Vn7r999S"); 
	//在字段添加一行记录并在opponents添加多个关联关系，指向Player对象
	// $res=$bmobObj->addRelRelation("opponents",array(array("Player","30BRpppy"),array("Player","g5s7EEEV"))); 
	//修改对象的关联数据，指向Game对象,　其id为Vn7r999S
	// $res=$bmobObj->updateRelPointer("794030b43a", "game", "Game", "Vn7r999S"); 
	//修改对象的一对多的关联数据
	// $res=$bmobObj->updateRelRelation("ce7f6de5c2", "opponents", array(array("Player","30BRpppy"), array("Player","g5s7EEEV"))); 
	//删除对象的关联数据
	$res=$bmobObj->deleteRelation("ce7f6de5c2", "opponents", array(array("Player","30BRpppy"), array("Player","g5s7EEEV"))); 

	/*
	 *  bmobUser 的例子
	 */	
	// $bmobUser = new BmobUser();
	// $res = $bmobUser->register(array("username"=>"cooldude117", "password"=>"p_n7!-e8", "phone"=>"415-392-0202", "email"=>"bmobtest111@126.com")); //用户注册, 其中username和password为必填字段
	// $res = $bmobUser->login("cooldude117","p_n7!-e8"); //用户登录, 第一个参数为用户名,第二个参数为密码
	// $res = $bmobUser->get("415b8fe99a"); // 获取id为415b8fe99a用户的信息
	// $res = $bmobUser->get(); // 获取所有用户的信息
	// $res = $bmobUser->update("415b8fe99a", "050391db407114d9801c8f2788c6b25a", array("phone"=>"02011111")); // 更新用户的信息
	// $res = $bmobUser->requestPasswordReset("bmobtest111@126.com"); // 请求重设密码,前提是用户将email与他们的账户关联起来
	// $res = $bmobUser->delete("415b8fe99a", "050391db407114d9801c8f2788c6b25a"); // 删除id为415b8fe99a的用户, 第一参数是用户id, 第二个参数为sessiontoken,在用户登录或注册后获取, 必填
	
	/*
     *  BmobCloudCode 的例子
     */ 
    // $cloudCode = new BmobCloudCode('getMsgCode'); //调用名字为getMsgCode的云端代码
    // $res = $cloudCode->get(array("name"=>"bmob")); //传入参数name，其值为bmob


	var_dump($res);
} catch (Exception $e) {
	echo $e;
}