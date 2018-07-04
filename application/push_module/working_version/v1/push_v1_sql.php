<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  push_v1_sql.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/04 12:12
 *  文件描述 :  数据库表迁移文件，删除/创建模块应用表
 *  历史记录 :  -----------------------
 */
    $config = [
        'host'      => 'gz-cdb-9yvp3vjn.sql.tencentcdb.com', // 数据库地址
        'port'      => '63119',                              // 数据库端口
        'database'  => 'shiguangyu_xm_kaifa1',               // 数据库名称
        'charset'   => 'utf8',                               // 设置字符集
        'user'      => 'root',                               // 用户名称
        'password'  => 'CBBBBBEIMbc01z',                     // 用户密码
    ];

    $table = [
        'pushList' => 'dlth_data_push_lists', // 消息推送表
    ];

	$date     =  date('Y-m-d H:i:s',time());

	// 连接数据库
    $server  = 'mysql:host='.$config['host'].';';

    $server .= 'port='.$config['port'].';';

    $server .= 'dbname='.$config['database'].';';

    $server .= 'charset='.$config['charset'].';';

    $pdo = new pdo($server,$config['user'],$config['password']);
	
	// 开启事务
	$pdo->beginTransaction();
	
	try{

	    // 删除消息推送表
	    $pdo->exec('drop table '.$table['pushList'].';');
	    echo '
删除 '.$table['pushList'].' 消息推送表
';
        // 创建消息推送表
		$pdo->exec('create table '.$table['pushList'].'(
		    push_index varchar(50) PRIMARY KEY,
			user_token varchar(50),
            push_formid varchar(50),
            push_time int(11)
		);');
		echo '
创建 '.$table['pushList'].' 消息推送表
';
		// 添加成功
		$pdo->commit();
		echo '
success
';

    }catch(PDOException $e){
    	// 添加失败
    	$pdo->rollback();
        echo $e->getMessage();
    }   
    