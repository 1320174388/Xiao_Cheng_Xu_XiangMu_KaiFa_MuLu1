<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  PushDao.php
 *  创 建 者 :  QiYunHai
 *  创建日期 :  2018/07/04 16:27
 *  文件描述 :  推送模板消息Dao层
 *  历史记录 :  -----------------------
 */
namespace app\push_module\working_version\v1\dao;
use app\push_module\working_version\v1\model\PushModel;
class PushDao implements PushInterface
{
	/**
     * 名  称 : pushCreate()
     * 功  能 : 将formId保存到数据库
     * 输  入 : (String) $userToken => '用户标识';
     * 输  入 : (String) $formId    => '表单ID';
     * 输  出 : ['msg'=>'error','data'=>false]
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/07/04 16:32
     */
    public function pushCreate($userToken,$formId);
    {
    	// 实例化PushModel层
    	$pushModel = new PushModel();
    	// 获取要保存的数据
    	$pushModel->push_index  = md5(uniqid());
    	$pushModel->user_token  = $userToken;
    	$pushModel->push_formid = $formId;
    	$pushModel->push_time   = time();
    	// 验证
    	if(!$pushModel->save()) return returnData('error');
    	// 返回数据格式
    	return returnData('success',true);
    }
}