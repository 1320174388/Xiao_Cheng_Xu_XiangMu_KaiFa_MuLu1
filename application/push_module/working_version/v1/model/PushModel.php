<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  PushModel.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/07/04 15:19
 *  文件描述 :  推送表数据模型
 *  历史记录 :  -----------------------
 */

namespace app\push_module\working_version\v1\model;
use think\Model;

class PushModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '';

    // 设置当前模型对应数据表的主键
    protected $pk = 'push_index';

    // 加载配置数据表名
    protected function initialize()
    {
        parent::initialize();
        $this->table = config('v1_tableName.PushTable');
    }
}