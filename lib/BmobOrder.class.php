<?php

include_once 'BmobRestClient.class.php';

/**
 * BmobUser batch对象类
 * @authort 2014.03.28
 * @license http://www.gnu.org/copyleft/lesser.html Distributed under the Lesser General Public License (LGPL)
 */
class BmobOrder extends BmobRestClient
{

    public function __construct($class = '')
    {
        parent::__construct();
    }


    /**
     * 查询订单
     * @param  $id
     */
    public function getOrder($id)
    {
        if (!empty($id)) {
            $sendRequest = $this->sendRequest(array(
                'method' => 'GET',
                'sendRequestUrl' => 'pay/' . $id,
            ));
            return $sendRequest;
        } else {
            $this->throwError('参数不能为空');
        }
    }


}

?>