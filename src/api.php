<?php

//配置api 接口
return [
    'type'=>'', //simple 简单jwt 不需要数据库和redis 空 则可选redis和mysql appid appsecret必填
    'authentication'=>"Authorization",
    'jwt_key'=>'kasushou',//jwtkey，请一定记得修改
    'timeDif' => 100,//时间误差
    'refreshExpires' => 3600 * 24 * 30,   //刷新token过期时间
    'expires' => 3600 * 24,//token-有效期
    'responseType' => 'json',
    'driver'        =>'redis',//缓存或数据驱动;//redis//mysql
    'redisTokenKey'  =>'AccessToken:',//缓存键名
    'redisRefreshTokenKey'        =>'RefreshAccessToken:',//缓存键名
    'sign'        =>false,//是否需要签名 //加强安全性
];
