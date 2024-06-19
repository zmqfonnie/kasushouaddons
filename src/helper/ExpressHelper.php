<?php

namespace kasushou\helper;
use kasushou\helper\HttpHelper;
class ExpressHelper{

    /**
     * 查询快递
     * @param $postcom  快递公司编码
     * @param $getNu  快递单号
     * @return array  物流跟踪信息数组
     */
    function queryExpress($postcom , $getNu) {
        $url = "https://m.kuaidi100.com/query?type=".$postcom."&postid=".$getNu."&id=1&valicode=&temp=0.49738534969422676";
        $resp = HttpHelper::get($url);
        return json_decode($resp,true);
    }
}