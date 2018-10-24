<?php

include_once 'BmobRestClient.class.php';

/**
 * BmobUser batch对象类
 * @author karvinchen
 * @license http://www.gnu.org/copyleft/lesser.html Distributed under the Lesser General Public License (LGPL)
 */
class BmobSms extends BmobRestClient
{

    public function __construct($class = '')
    {
        parent::__construct();
    }


    /**
     * 发送短信验证码
     * @param  $mobile    发送的手机号
     */
    public function sendSmsVerifyCode($mobile, $template="")
    {
        if (!empty($mobile)) {
            if( $template ){
                $data = array("mobilePhoneNumber" => $mobile, "template"=>$template);
            } else {
                $data = array("mobilePhoneNumber" => $mobile);
            }
            $sendRequest = $this->sendRequest(array(
                'method' => 'POST',
                'data' => $data,
                'sendRequestUrl' => 'requestSmsCode',
            ));
            return $sendRequest;
        } else {
            $this->throwError('参数不能为空');
        }
    }

    /**
     * 验证短信验证码
     * @param  $mobile    发送的手机号
     * @param  $verifyCode  短信验证码
     */
    public function verifySmsCode($mobile, $verifyCode)
    {
        if (!empty($mobile) && !empty($verifyCode)) {
            $data = array("mobilePhoneNumber" => $mobile);
            $sendRequest = $this->sendRequest(array(
                'method' => 'POST',
                'data' => $data,
                'sendRequestUrl' => 'verifySmsCode/' . $verifyCode,
            ));
            return $sendRequest;
        } else {
            $this->throwError('参数不能为空');
        }
    }

    


}

?>