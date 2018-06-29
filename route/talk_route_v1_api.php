<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  talk_route_v1_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/29 17:20
 *  文件描述 :  客服功能模块接口路由
 *  历史记录 :  -----------------------
 */

// +------------------------------------------------------
// : 传值方式：消息推送接口地址
// +------------------------------------------------------
Route::get(
    'v1/talkModule/sessionRoute',
    'talk_module/v1.controller.SessionController/sessionValue'
);