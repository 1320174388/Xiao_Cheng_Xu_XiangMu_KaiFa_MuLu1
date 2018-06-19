<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  AdminService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/12 17:24
 *  文件描述 :  处理管理员的业务逻辑
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v3\service;
use \think\Db;
use app\right_module\working_version\v3\dao\ApplyDao;
use app\right_module\working_version\v3\dao\AdminDao;

class AdminService
{
    /**
     * 名  称 : rightAdmin()
     * 功  能 : 执行审核管理员操作
     * 输  入 : (string) $token => '用户标识';
     * 输  出 : [ 'msg'=>'success' , 'data'=>$list['data'] ]
     * 创  建 : 2018/06/17 21:57
     */
    public function rightAdmin($token)
    {
        // 获取管理员数据
        $data = (new ApplyDao)->applySelect($token);
        if($data['msg']=='error') return returnData('error','没有申请');

        // 启动事务
        Db::startTrans();
        try {
            // 删除管理员申请数据
            (new ApplyDao)->applyDelete($token);
            // 添加管理员
            $admin = (new AdminDao)->adminCreate($data['data']);
            // 提交事务
            Db::commit();
            // 返回数据格式
            return returnData('success',true);
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            // 返回数据格式
            if($admin['msg']=='error') return returnData('error','审核失败');
        }
    }
}