<?php

/*
 * This file is part of PHP CS Fixer.
 * (c) kcloze <pei.greet@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

return $config = [
    //log目录
    'logPath'           => __DIR__ . '/log',
    'pidPath'           => __DIR__ . '/log',
    'sleep'             => 3, //每次topic消费完之后停留毫秒数，线上环境不能过大
    'processName'       => ':swooleTopicQueue', // 设置进程名, 方便管理, 默认值 swooleTopicQueue
    //只支持redis
    'cache'             => [
            'host'     => '192.168.1.105',
            'port'     => 6379,
    ],
    //job任务相关
    'job'         => [
        'topics'  => [
            ['name'=>'MyJob', 'workerMinNum'=>1, 'workerMaxNum'=>20],
            ['name'=> 'MyJob2', 'workerMinNum'=>3, 'workerMaxNum'=>10],
            ['name'=> 'MyJob3', 'workerMinNum'=>1, 'workerMaxNum'=>10],
        ],
        'queue'   => [
            'type' => 'redis',
            'host' => '192.168.1.105',
            'port' => 6379,
        ],
   ],
   //框架类型及装载类
   'framework' => [
       'type' => 'swoole-jobs',
       //可以自定义，但是该类必须继承\Kcloze\Jobs\Action\BaseAction
       'class'=> 'Kcloze\Jobs\Action\SwooleJobsAction',

   ],

];
