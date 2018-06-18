<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  RightDao.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/18 12:45
 *  文件描述 :  操作权限数据表数据
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v3\dao;
use app\right_module\working_version\v3\model\RightModel;
use app\right_module\working_version\v3\library\RightLibrary;

class RightDao implements RightInterface
{
    /**
     * 名  称 : RightSelect()
     * 功  能 : 声明：获取权限列表数据
     * 输  入 : -----------------------
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 创  建 : 2018/06/18 12:40
     */
    public function RightSelect()
    {

    }

    /**
     * 名  称 : RightCreate()
     * 功  能 : 声明：添加权限列表数据
     * 输  入 : (string) $rightName  => '权限名称';
     * 输  入 : (string) $rightRoute => '权限路由';
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 创  建 : 2018/06/18 12:40
     */
    public function RightCreate($rightName,$rightRoute)
    {
        // 实例化模型
        $rightModel = new RightModel;
        // 处理数据
        $rightModel->right_index = (new RightLibrary)->RightToken();
        $rightModel->right_name  = $rightName;
        $rightModel->right_route = $rightRoute;
        // 保存数据
        $res = $rightModel->save();
        if(!$res) return returnData('error');
        // 返回数据
        return returnData('success',true);
    }

    /**
     * 名  称 : RightUpdate()
     * 功  能 : 声明：修改权限列表数据
     * 输  入 : (string) $index => '权限列表主键';
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 创  建 : 2018/06/18 12:40
     */
    public function RightUpdate($index)
    {

    }

    /**
     * 名  称 : RightDelete()
     * 功  能 : 声明：删除权限列表数据
     * 输  入 : (string) $index => '权限列表主键';
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 创  建 : 2018/06/18 12:40
     */
    public function RightDelete($index)
    {

    }
}