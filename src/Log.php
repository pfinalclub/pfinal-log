<?php
/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2019/2/27
 * Time: 11:33
 *
 *
 *                      _ooOoo_
 *                     o8888888o
 *                     88" . "88
 *                     (| ^_^ |)
 *                     O\  =  /O
 *                  ____/`---'\____
 *                .'  \\|     |//  `.
 *               /  \\|||  :  |||//  \
 *              /  _||||| -:- |||||-  \
 *              |   | \\\  -  /// |   |
 *              | \_|  ''\---/''  |   |
 *              \  .-\__  `-`  ___/-. /
 *            ___`. .'  /--.--\  `. . ___
 *          ."" '<  `.___\_<|>_/___.'  >'"".
 *        | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *        \  \ `-.   \_ __\ /__ _/   .-` /  /
 *  ========`-.____`-.___\_____/___.-`____.-'========
 *                       `=---='
 *  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
 *           佛祖保佑       永无BUG     永不修改
 *
 */

namespace pf\log;

use pf\log\build\Base;

class Log
{
    const FATAL = 'FATAL';          // 严重错误: 导致系统崩溃无法使用
    const ERROR = 'ERROR';          // 一般错误: 一般性错误
    const WARNING = 'WARNING';      // 警告性错误: 需要发出警告的错误
    const NOTICE = 'NOTICE';        //通知: 程序可以运行但是还不够完美的错误
    const DEBUG = 'DEBUG';          //调试: 调试信息
    const SQL = 'SQL';              //SQL：SQL语句 注意只在调试模式开启时有效
    const EXCEPTION = 'EXCEPTION';  //异常错误
    protected static $link;

    public static function single()
    {
        if (is_null(self::$link)) {
            self::$link = new Base();
        }
        return self::$link;
    }

    public function __call($method, $params)
    {
        return call_user_func_array([self::single(), $method], $params);
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([static::single(), $name], $arguments);
    }
}