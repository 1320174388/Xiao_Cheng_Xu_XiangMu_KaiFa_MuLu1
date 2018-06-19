<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  right_route_v3_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/16 21:03
 *  文件描述 :  权限模块路由地址
 *  历史记录 :  -----------------------
 */
// +--------------------------------
// + :权限管理定义路由
// +--------------------------------
/**
 * 传值方式：POST
 * 路由功能：执行用户申请管理员功能
 */
Route::post(
    'v3/right_module/apply_init',
    'right_module/v3.controller.ApplyController/applyInit'
);
/**
 * 传值方式：GET
 * 路由功能：获取管理员申请表数据
 */
Route::get(
    'v3/right_module/apply_list',
    'right_module/v3.controller.ApplyController/applyList'
);
/**
 * 传值方式：POST
 * 路由功能：执行添加管理员操作
 */
Route::post(
    'v3/right_module/admin_init/:applyToken',
    'right_module/v3.controller.AdminController/adminInit'
);
/**
 * 传值方式：POST
 * 路由功能：执行添加权限操作
 */
Route::post(
    'v3/right_module/right_route',
    'right_module/v3.controller.RightController/rightAddRoute'
);

/**
 * 传值方式：GET
 * 路由功能：获取所有权限操作
 */
Route::get(
    'v3/right_module/right_route',
    'right_module/v3.controller.RightController/rightGetRoute'
);

/**
 * 传值方式：PUT
 * 路由功能：更新index对应权限
 */
Route::put(
    'v3/right_module/right_route/:index',
    'right_module/v3.controller.RightController/rightEditRoute'
);

/**
 * 传值方式：DELETE
 * 路由功能：删除index对应权限
 */
Route::delete(
    'v3/right_module/right_route/:index',
    'right_module/v3.controller.RightController/rightDelRoute'
);
