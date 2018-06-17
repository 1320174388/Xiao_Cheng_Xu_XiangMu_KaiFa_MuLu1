<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  right_route_v3_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/16 21:03
 *  文件描述 :  权限模块路由地址
 *  历史记录 :  -----------------------
 */
/**
 * 传值方式：GET
 * 路由功能：获取管理员申请表数据
 */
Route::get(
    'v3/right_module/apply_list',
    'right_module/v3.controller.RightController/applyList'
);
/**
 * 传值方式：POST
 * 路由功能：执行用户申请管理员功能
 */
Route::post(
    'v3/right_module/apply_init',
    'right_module/v3.controller.RightController/applyInit'
);
/**
 * 传值方式：POST
 * 路由功能：执行添加管理员操作
 */
Route::post(
    'v3/right_module/admin_init/:applyToken',
    'right_module/v3.controller.RightController/adminInit'
);