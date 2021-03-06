<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  AdminModel.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/16 20:12
 *  文件描述 :  管理员表数据模型
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v2\model;
use think\Model;

class AdminModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '';

    // 设置当前模型对应数据表的主键
    protected $pk = 'admin_token';

    // 加载配置数据表名
    protected function initialize()
    {
        parent::initialize();
        $this->table = config('v2_tableName.AdminTable');
    }

    // 定义关联权限模型
    public function roles()
    {
        return $this->belongsToMany(
            'RoleModel',
            '\\app\\right_module\\working_version\\v3\\model\\AdminRole',
            'role_index',
            'admin_token'
        );
    }
}