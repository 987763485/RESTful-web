<?php

return [
    // URL普通方式参数 用于自动生成
    'url_common_param'       => true,
    // 是否强制使用路由
    'url_route_must'         => true,
    //分页配置
    'paginate'               => [
        'type'      => '\app\web\bootstrap',
        'var_page'  => 'page',
        'list_rows' => 12,
    ]
];