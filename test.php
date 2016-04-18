<?php
include_once 'lib/BmobObject.class.php';
include_once 'lib/BmobUser.class.php';
include_once 'lib/BmobBatch.class.php';
include_once 'lib/BmobFile.class.php';
include_once 'lib/BmobImage.class.php';
include_once 'lib/BmobRole.class.php';
include_once 'lib/BmobPush.class.php';
include_once 'lib/BmobPay.class.php';
include_once 'lib/BmobSms.class.php';
include_once 'lib/BmobApp.class.php';
include_once 'lib/BmobSchemas.class.php';
include_once 'lib/BmobTimestamp.class.php';
include_once 'lib/BmobCloudCode.class.php';
include_once 'lib/BmobBql.class.php';

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
    // $res=$bmobObj->addRelPointer(array(array("game","Game","Vn7r999S"), array("game1","Game","Vn7r999S")));
    //在字段添加一行记录并在opponents添加多个关联关系，指向Player对象
    // $res=$bmobObj->addRelRelation("opponents",array(array("Player","30BRpppy"),array("Player","g5s7EEEV")));
    //修改对象的关联数据，指向Game对象,　其id为Vn7r999S
    // $res=$bmobObj->updateRelPointer("794030b43a", "game", "Game", "Vn7r999S");
    //修改对象的一对多的关联数据
    // $res=$bmobObj->updateRelRelation("ce7f6de5c2", "opponents", array(array("Player","30BRpppy"), array("Player","g5s7EEEV")));
    //删除对象的关联数据
    // $res=$bmobObj->deleteRelation("ce7f6de5c2", "opponents", array(array("Player","30BRpppy"), array("Player","g5s7EEEV")));

    ////批量操作
    // $bmobBatch = new BmobBatch();
    // $data=array(
    // 	array(
    // 		"method"=>"POST",
    // 		"path"=>"/1/classes/GameScore",
    // 		"body"=>array(
    // 					"score"=>1337,
    // 					"playerName"=>"Sean Plott",
    // 				),
    // 	),
    // 	array(
    // 		"method"=>"POST",
    // 		"path"=>"/1/classes/GameScore",
    // 		"body"=>array(
    // 					"score"=>1338,
    // 					"playerName"=>"ZeroCool",
    // 				),
    // 	),
    // );
    // $res=$bmobBatch->batch($data);

    //上传文件
    /*
    如果需要上传大文件,请在代码中调整php的配置:
    ini_set('max_execution_time', 30); //每个PHP页面运行的最大时间值(秒)，默认30秒
    ini_set('max_input_time', 60); //每个PHP页面接收数据所需的最大时间，默认60秒
    ini_set('memory_limit', '8m'); //每个PHP页面所吃掉的最大内存，默认8M
    ini_set('upload_max_filesize', '2m'); //即允许上传文件大小的最大值。默认为2M
    ini_set('post_max_size', '8m'); //指通过表单POST给PHP的所能接收的最大值，包括表单里的所有值。默认为8M
    */
    $bmobFile = new BmobFile();
    //第一个参数是文件的名称,第二个参数是文件的url(可以是本地路径,最终是通过file_get_contents获取文件内容)
    //返回值:{ public $cdn => string(5) "upyun" public $filename => string(7) "988.png" public $url => string(73) "http://bmob-cdn-1.b0.upaiyun.com/png/463305b840dddbf480a326d0775cc556.png" } 
    // $res=$bmobFile->uploadFile2("988.png","http://file.bmob.cn/M02/4A/CB/oYYBAFYu36mAAIN_AAEbMJNyjaw988.png");
    // $res=$bmobFile->delete2("upyun", "http://bmob-cdn-1.b0.upaiyun.com/png/e7a0836940aa935f809ddbfd98a7ee74.png");


    // // 生成缩微图
    // $bmobImage = new BmobImage();
    // $data=array("image"=>"http://file.bmob.cn/M00/01/49/wKhkA1OEmUmAXRToAAIAco88Nk08205940","mode"=>0, "quality"=>100, 'width'=>100);
    // $res=$bmobImage->imageThumbnail($data);

    // // 生成水印
    // $data=array("image"=>"http://file.bmob.cn/M01/FB/94/oYYBAFVsLzaATYHUAAInI2Hg05M737.jpg","watermark"=>"http://file.bmob.cn/M01/F8/4C/oYYBAFVru0uAa0yyAAAsGVkLsy8979.jpg",
    // 	"dissolve"=>100, 'gravity'=>"SouthWest","distanceX"=>10,"distanceY"=>10);
    // $res=$bmobImage->imagesWatermark($data);


    //角色的例子
    $bmobRole = new BmobRole();
    // $res = $bmobRole->createRole(array("name"=>"Mo1derators", "ACL"=>array("*"=>array("read"=>true,"write"=>true)))); //创建角色
    // $res = $bmobRole->getRole("dcf9ad7d2e"); //获取角色

    // $data=array(
    // 		array(
    // 		  "__type"=>"Pointer",
    //              "className"=>"_User",
    //              "objectId"=>"WXHsFFFd",
    // 		),
    // 	);
    // $res = $bmobRole->updateRole("d4642acf90", "users", "AddRelation", $data); //更改角色
    // $res = $bmobRole->deleteRole("d4642acf90", "d365d5834061d9f6805047131893ae13"); //删除角色

    ////推送的例子
    // $bmobPush = new BmobPush();
    // 添加设备表
    // $res = $bmobPush->addInstallations(array("deviceType"=>"ios","deviceToken"=>"abcdef0123456789abcdef0123456789abcdef0123456789abcdef0123456789","channels"=>array("Giants")));
    // $res = $bmobPush->updateInstallations("fdcc6a94c6",array("injuryReports"=>true)); //更新设备表
    // $res = $bmobPush->push(array("data"=>array("alert"=>"hello"))); //推送消息

    ////支付的例子
     $bmobPay = new BmobPay();
     //$res = $bmobPay->getOrder("fd343232cc6a94c6");  //查询订单
     // $res =$bmobPay->webPay(0.01, "充值", "给应用充值0.01元");

    ////短信相关
    $bmobSms = new BmobSms();
    // $res = $bmobSms->sendSms("131xxxxxxxx", "您的验证码是：222222, 有效期是10分钟。"); //发送短信
    // $res = $bmobSms->sendSmsVerifyCode("131xxxxxxxx", "注册模板");  //发送短信验证码
    // $res = $bmobSms->verifySmsCode("131xxxxxxxx","028584");  //发送短信验证码
    // $res = $bmobSms->querySms("6466181");  //查询短信状态

    ////app相关
    // $bmobApp = new BmobApp();
    // $res = $bmobApp->getApp("h611115@126.com", "111111"); //获取全部app的信息
    // $res = $bmobApp->getApp("h611115@126.com", "111111", "85b5xxxxxxxx9e59a795da547c68e6"); //获取app id 为"85b56934cce1129e59a795da547c68e6"的信息
    // $res = $bmobApp->createApp("h611115@126.com", "111111", array("appName"=>"myapp111")); //创建一个名为"myapp111"的app
    // $res = $bmobApp->updateApp("h611115@126.com", "111111", "330xxxxxxxxx578d1f923126547bea5", array("appName"=>"myapp11122")); //修改一个名为"myapp111"的app

    //// schemas相关
    $bmobSchemas = new BmobSchemas();
    // $res = $bmobSchemas->getSchemas("e09fb5cbb5b825c78989504604c0dcff"); //获取表Game的信息
    // $data=array(
    // 		"className" => "City",
    // 		"fields" => array(
    // 		  "name" => array(
    // 		  	"type"=>"String",
    // 		  ),
    // 		),
    // 	);
    // $res = $bmobSchemas->createSchemas("e09fb5cbb5bxxxxxxxx9504604c0dcff", "City", $data); //创建表“City”，并添加字段“name”
    // $data=array(
    // 		"className" => "City",
    // 		"fields" => array(
    // 		  "name" => array(
    // 		  	"type"=>"String",
    // 		  	"__op"=>"Delete"
    // 		  ),
    // 		),
    // 	);
    // $res = $bmobSchemas->updateSchemas("e09fb5cbb5bxxxxxxxx9504604c0dcff", "City", $data); //在表“City”中删除字段“name”
    // $res = $bmobSchemas->deleteSchemas("e09fb5cbb5bxxxxxxxx9504604c0dcff", "City"); //删除表“City”


    //// 时间戳相关
    // $bmobTimestamp = new BmobTimestamp();
    // $res = $bmobTimestamp->getTimestamp();  //获取服务器时间

    //// bql相关
     $bmobBql = new BmobBql();
     // $res = $bmobBql->query(array('bql=select * from GameScore where name=? limit ?,? order by name','values=["dennis", 0, 100]'));  
     // $res = $bmobBql->query(array('bql'=>'select * from GameScore where score=11'));  
      // $res = $bmobBql->query(array('bql'=>'select * from GameScore where score=?', 'values'=>'[11]'));  
    /*
     *  bmobUser 的例子
     */
    $bmobUser = new BmobUser();
    // $res = $bmobUser->register(array("username"=>"cooldude117", "password"=>"p_n7!-e8", "phone"=>"415-392-0202", "email"=>"bmobtest111@126.com")); //用户注册, 其中username和password为必填字段
    // $res = $bmobUser->register(array("mobilePhoneNumber"=>"131xxxxxxxx", "smsCode"=>"502845")); //用户注册, mobilePhoneNumber 就是手机号码，而 smsCode 是使用 请求短信验证码API发送到用户手机上的 6位验证码字符串。如果是新用户且不传入 username，默认用户名将是手机号码。
    // $res = $bmobUser->login("test111@qq.com","111111"); //用户登录, 第一个参数为用户名,第二个参数为密码
    // $res = $bmobUser->loginByMobile("131xxxxxxxx","745399"); //用手机号登录, 其中mobilePhoneNumber和smsCode为必填字段
    // $res = $bmobUser->get("415b8fe99a"); // 获取id为415b8fe99a用户的信息
    // $res = $bmobUser->get(); // 获取所有用户的信息
    // $res=$bmobUser->get("",array('where={"age":11}')); 
    // $res = $bmobUser->update("415b8fe99a", "050391db407114d9801c8f2788c6b25a", array("phone"=>"02011111")); // 更新用户的信息
    // $res = $bmobUser->updateByMasterKey("0290813a89", "e09fb5cbb5b825c78989504604c0dcff", array("phone"=>"02011122")); // 通过masterKey更新用户的信息

    // $res = $bmobUser->requestPasswordReset("bmobtest111@126.com"); // 请求重设密码,前提是用户将email与他们的账户关联起来
    // $res = $bmobUser->delete("415b8fe99a", "050391db407114d9801c8f2788c6b25a"); // 删除id为415b8fe99a的用户, 第一参数是用户id, 第二个参数为sessiontoken,在用户登录或注册后获取, 必填
    // $res = $bmobUser->deleteByMasterKey("0290813a89", "e09fb5cbb5b825c78989504604c0dcff"); // 通过masterKey删除用户
    // $res = $bmobUser->resetPasswordBySmsCode("111111", "134554"); // 使用短信验证码进行密码重置
    // $res = $bmobUser->updateUserPassword("WXHsFFFd", "d365d5834061d9f6805047131893ae13" , "111111", "111111"); //用户输入一次旧密码做一次校验，旧密码正确才可以修改为新密码
    // $res = $bmobUser->requestEmailVerify("h622222225@126.com"); //请求验证Email


    /*
     *  BmobCloudCode 的例子
     */
    // $cloudCode = new BmobCloudCode('getMsgCode'); //调用名字为getMsgCode的云端代码
    // $res = $cloudCode->get(array("name"=>"bmob")); //传入参数name，其值为bmob


    var_dump($res);
} catch (Exception $e) {
    echo $e;
}
