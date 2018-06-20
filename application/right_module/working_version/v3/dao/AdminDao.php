<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  AdminDao.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/16 20:12
 *  文件描述 :  操作模型，获取用户删除用户申请表数据
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v3\dao;
use app\right_module\working_version\v3\model\AdminModel;
use think\Db;

class AdminDao implements AdminInterface
{
    /**
     * 名  称 : adminSelect()
     * 功  能 : 声明：获取管理员用户数据
     * 输  入 : (string) $token => '项目小程序用户标识';
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 输  出 : [ 'msg'=>'error'  , 'data'=>false ]
     * 创  建 : 2018/06/16 13:42
     */
    public function adminSelect($token='')
    {
        // 获取用户数据
        if( $token == '' ){
            $user = AdminModel::all();
        }else{
            $user = AdminModel::where('admin_token',$token)->find();
        }
        // 判断数据
        if(!$user) return returnData('error');
        // 返回数据
        return returnData('success',$user);
    }

    /**
     * 名  称 : adminCreate()
     * 功  能 : 声明：添加管理员用户数据
     * 输  入 : (object) $applyInfo => '管理员申请数据对象';
     * 输  入 : (string) $roleArr   => '权限数组';
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 输  出 : [ 'msg'=>'empty'  , 'data'=>false ]
     * 创  建 : 2018/06/16 13:43
     */
    public function adminCreate($applyInfo,$roletArr)
    {
        // 启动事务
        Db::startTrans();
        try {
            // 实例化管理员数据模型
            $adminModel = new AdminModel;
            // 处理数据
            $adminModel->admin_token = $applyInfo['apply_token'];
            $adminModel->admin_name  = $applyInfo['apply_name'];
            $adminModel->admin_phone = $applyInfo['apply_phone'];
            $adminModel->admin_time  = $applyInfo['apply_time'];
            // 写入数据
            $res = $adminModel->save();
            if(!$res)return returnData('error');
            // 获取添加职位数据
            $role = AdminModel::get($applyInfo['apply_token']);
            // 处理权限
            $arr = [];
            foreach($roletArr as $v){ $arr[] = $v; }
            // 执行写入权限操作
            $roles = $role->roles()->saveAll($arr);
            // 验证数据
            if(!$roles) return returnData('error');
            // 确定事务
            Db::commit();
            // 返回数据
            return returnData('success',$applyInfo);
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            // 验证数据
            return returnData('error');
        }
    }

    /**
     * 名  称 : adminUpdate()
     * 功  能 : 声明：修改管理员用户数据
     * 输  入 : (string) $token    => '项目小程序用户标识';
     * 输  入 : (string) $roletArr => '职位数组';
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 输  出 : [ 'msg'=>'empty'  , 'data'=>false ]
     * 创  建 : 2018/06/16 13:44
     */
    public function adminUpdate($token,$roletArr)
    {
        // 启动事务
        Db::startTrans();
        try {
            // 获取表明,删除原关联
            $table = config('v3_tableName.AdminRole');
            $dd = Db::table($table)->where('admin_token',$token)->delete();
            if(!$dd) return  returnData('error');
            // 实例化管理员数据模型
            $role = AdminModel::get($token);
            // 处理权限
            $arr = [];
            foreach($roletArr as $v){ $arr[] = $v; }
            // 执行写入权限操作
            $roles = $role->roles()->saveAll($arr);
            // 验证数据
            if(!$roles) return returnData('error');
            // 确定事务
            Db::commit();
            // 返回数据
            return returnData('success',true);
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            // 验证数据
            return returnData('error');
        }
    }

    /**
     * 名  称 : adminDelete()
     * 功  能 : 声明：删除管理员用户数据
     * 输  入 : (string) $token => '项目小程序用户标识';
     * 输  出 : [ 'msg'=>'success', 'data'=>true ]
     * 创  建 : 2018/06/16 13:45
     */
    public function adminDelete($token)
    {
        // 启动事务
        Db::startTrans();
        try {
            // 删除管理员
            $res = AdminModel::get($token)->delete();
            if(!$res) return returnData('error');

            // 获取表明,删除原关联
            $table = config('v3_tableName.AdminRole');
            $dd = Db::table($table)->where('admin_token',$token)->delete();
            if(!$dd) return  returnData('error');

            Db::commit();
            // 返回数据
            return returnData('success',true);
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            // 验证数据
            return returnData('error');
        }

    }
}