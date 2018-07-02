<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ProblemDao.php
 *  创 建 者 :  Qi Yun Hai
 *  创建日期 :  2018/07/02 14:41
 *  文件描述 :  数据持久层,操作Problem：Model模型处理数据
 *  历史记录 :  -----------------------
 */
namespace app\talk_module\working_version\v1\dao;
use think\Db;
use app\talk_module\working_version\v1\model\LeavingModel;
use app\talk_module\working_version\v1\model\MessageModel;
use app\talk_module\working_version\v1\model\PeopleModel;

class ProblemDao implements ProblemInterface
{
    /**
     * 名  称 : problemCreate()
     * 功  能 : 获取留言人提问信息，如果留言人不存在，将留留言人写入数据库。
     * 功  能 : 用户提的问题，写入问题数据库，保存标题，创建时间。
     * 功  能 : 提问问题的内容写入留言信息数据库，信息身份：User/Admin
     * 输  入 : (Array) $data = [
     *     'peopleName'     => '留言人名称',
     *     'peopleSex'      => '留言人性别',
     *     'leavingTitle'   => '留言标题',
     *     'messageContent' => '留言内容',
     * ];
     * 输  出 : [ 'msg'=>'success', 'data'=>true ]
     * 输  出 : [ 'msg'=>'error' , 'data'=>false ]
     * 创  建 : 2018/07/05 09:15
     */
    public function problemCreate($data)
    {
        // 实例化留言人信息model类
        $peopleModel  = new PeopleModel();
        // 实例化保存所有留言model类
        $leavingModel = new LeavingModel();
        // 实例化留言信息model类
        $messageModel = new MessageModel();
        // 标识
        $peopleIndex  = md5(uniqid());
        $leavingIndex = md5(uniqid());
        // 启动事务
        Db::startTrans();
        try {
            // 处理留言人数据
            $peopleModel->people_index  = $peopleIndex;
            $peopleModel->people_name   = $data['peopleName'];
            $peopleModel->people_sex    = $data['peopleSex'];
            $peopleModel->people_status = '1';
            $peopleModel->people_time   = time();
            // 验证
            if(!$peopleModel->save())
                // 返回数据
                return returnData('error',false);
            // 处理留言数据
            $leavingModel->leaving_index  = $leavingIndex;
            $leavingModel->people_index   = $peopleIndex;
            $leavingModel->leaving_title  = $data['leavingTitle'];
            $leavingModel->leaving_status = '1';
            $leavingModel->leaving_time   = time();
            // 验证
            if(!$leavingModel->save())
                // 返回数据
                return returnData('error',false);
            // 处理留言信息数据
            $messageModel->leaving_index    = $leavingIndex;
            $messageModel->message_content  = $data['messageContent'];
            $messageModel->message_identity = 'User';
            $messageModel->message_sort     = '1';
            // 验证
            if(!$messageModel->save())
                // 返回数据
                return returnData('error',false);
            // 提交事务
            Db::commit();
            return returnData('success',true);
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return returnData('error',false);
        }
    }
}