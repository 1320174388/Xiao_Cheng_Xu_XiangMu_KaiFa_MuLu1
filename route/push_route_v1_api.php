<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  push_route_v1_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/29 17:20
 *  文件描述 :  推送功能模块接口路由
 *  历史记录 :  -----------------------
 */

// +------------------------------------------------------
// : 前台接口，传值方式：POST，功能：接受formId接口
// +------------------------------------------------------
Route::post(
    'v1/push_module/push_route',
    'push_module/v1.controller.PushController/pushInit'
);

// +------------------------------------------------------
// : 路由分组：v1/talk_module/ 中间件：Right_v3_IsAdmin
// +------------------------------------------------------
Route::group('v1/push_module/', function(){
    /**
     * 传值方式：PUT，功能：添加自动回复信息接口。】
     */
    Route::put(
        'push_route/:token',
        'push_module/v1.controller.PushController/pushTemplate'
    );
});

