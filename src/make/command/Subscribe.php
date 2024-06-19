<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2021 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace kasushou\make\command;

use think\console\command\Make;

class Subscribe extends Make
{
    protected $type = "Subscribe";

    protected function configure()
    {
        parent::configure();
        $this->setName('kss:subscribe')
            ->setDescription('Create a new subscribe class');
    }

    protected function getStub(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'stubs' . DIRECTORY_SEPARATOR . 'subscribe.stub';
    }

    protected function getNamespace(string $app): string
    {
        return parent::getNamespace($app) . '\\subscribe';
    }
}
