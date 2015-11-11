<?php
namespace Models\Model;

use Think\Model;

/*
 *对应数据表:user
 *对应数据表:vote_user
 * */

class UserModel extends Model
{
//    protected $tablePrefix='vote_';
//    protected $tableName='member';
    /*
     * ThinkPHP框架会自动的将表名转换为小写
     * 但是linux系统下数据库表的名称是区分大小写的
     * trueTableName会保留数据表的大小写
     * */
//    protected $trueTableName='vote_AdminUser';

    protected $fields = array(
        'id',
        'username',
        'password',
        'email',
        'create_time',
        'status',
        '_pk' => 'id',
        '_type' => array(
            'id' => 'mediumint',
            'username' => 'varchar',
            'password' => 'varchar',
            'email' => 'varchar',
            'create_time' => 'datetime',
            'status' => 'tinyint',
        )
    );
}