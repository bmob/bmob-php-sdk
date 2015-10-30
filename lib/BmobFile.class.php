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
     * 上传文件
     * @param array $data 批量操作的数据
     */
    public function uploadFile($fileName, $filePath)
    {
        if (!empty($fileName) && !empty($filePath)) {
            //重设对象的属性
            $this->cleanData();
            $this->data = file_get_contents($filePath);
            $sendRequest = $this->sendRequest(array(
                'method' => 'POST',
                'sendRequestUrl' => 'files/' . base64_encode($fileName),
                'data' => $this->data,
            ));
            return $sendRequest;
        } else {
            $this->throwError('请输入文件名和文件路径');
        }
    }

    /**
     * 上传文件
     * @param array $data 批量操作的数据
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

}

?>