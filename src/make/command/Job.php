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

class Job extends Make
{
    protected $type = "Job";

    protected function configure()
    {
        parent::configure();
        $this->setName('kss:job')
            ->setDescription('Create a new job class');
    }

    protected function getStub(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'stubs' . DIRECTORY_SEPARATOR . 'job.stub';
    }

    protected function getNamespace(string $app): string
    {
        return parent::getNamespace($app) . '\\job';
    }
}
