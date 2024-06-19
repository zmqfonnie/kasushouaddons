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

namespace think\console\command\make;

use think\console\command\Make;

class Logic extends Make
{
    protected $type = "Logic";

    protected function configure()
    {
        parent::configure();
        $this->setName('make:table')
            ->setDescription('Create a table tpl');
    }

    protected function getStub(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'stubs' . DIRECTORY_SEPARATOR . 'logic.stub';
    }

    protected function getNamespace(string $app): string
    {
        return parent::getNamespace($app) . '\\logic';
    }
}
