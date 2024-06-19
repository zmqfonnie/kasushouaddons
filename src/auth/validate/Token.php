<?php


namespace kasushou\auth\validate;
use think\Validate;
/**
 * 生成token参数验证器
 */
class Token extends Validate
{

    protected $rule = [
        'appid'       =>  'require',
        'appsecret'       =>  'require',
        'username'      =>    'require',
        'password'      =>    'require|min:6',
        'nonce'       =>  'require',
        'timestamp'   =>  'number|require',
        'sign'        =>  'require',
    ];

    protected $scene  = [
        'jwt'  =>  ['appid','appsecret','username','password','timestamp'],
        'simple'  =>  ['username','password','timestamp'],
    ];

    protected $message  =   [
        'appid.require'    => 'appid不能为空',
        'appsecret.require'    => 'appsecret不能为空',
        'username.require'   =>'用户名不能为空',
        'password.require'   =>'密码不能为空',
        'nonce.require'    => '随机数不能为空',
        'timestamp.number' => '时间戳格式错误',
        'sign.require'     => '签名不能为空',
    ];
}