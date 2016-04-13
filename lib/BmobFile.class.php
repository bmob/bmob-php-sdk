<?php

include_once 'BmobRestClient.class.php';

/**
 * BmobUser batch对象类
 * @author karvinchen
 * @license http://www.gnu.org/copyleft/lesser.html Distributed under the Lesser General Public License (LGPL)
 */
class BmobFile extends BmobRestClient
{

    public function __construct($class = '')
    {
        parent::__construct();
    }



    /**
     * 删除文件
     * @param array $data 删除文件的数据
     */
    public function delete($url)
    {
        if (!empty($url) ) {
            //重设对象的属性
            $this->cleanData();
            $sendRequest = $this->sendRequest(array(
                'method' => 'DELETE',
                'sendRequestUrl' => 'files/' . $url,
            ));
            return $sendRequest;
        } else {
            $this->throwError('请输入url');
        }
    }

    /**
     * 用CDN上传文件
     * @param array $data 批量操作的数据
     */
    public function uploadFile2($fileName, $filePath)
    {
        if (!empty($fileName) && !empty($filePath)) {
            //重设对象的属性
            $this->cleanData();
            $this->data = file_get_contents($filePath);
            $sendRequest = $this->sendRequest(array(
                'method' => 'POST',
                'sendRequestUrl' => 'files/' . $fileName,
                'data' => $this->data,
            ), 2);
            return $sendRequest;
        } else {
            $this->throwError('请输入文件名和文件路径');
        }
    }    


     /**
     * 用uploadFile2接口上传的文件只能用这个接口删除文件
     * @param array $url
     */
    public function delete2($cdn, $url)
    {
        if (!empty($url) && !empty($cdn) ) {
            //重设对象的属性
            $this->cleanData();

            $path = pathinfo($url);  
            if( !$path ){
                $this->throwError('解析url错误, 正确的url是类似于:http://bmob-cdn-1.b0.upaiyun.com/png/463305b840dddbf480a326d0775cc556.png');
            }
            $url = $path['extension']."/".$path['basename'];

            $sendRequest = $this->sendRequest(array(
                'method' => 'DELETE',
                'sendRequestUrl' => 'files/' .$cdn."/". $url,
            ), 2 );

            // print_r('files/' .$cdn."/". $url);
            return $sendRequest;
        } else {
            $this->throwError('请输入url');
        }
    }   
}

?>