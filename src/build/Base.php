<?php
/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2019/2/27
 * Time: 11:34
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

namespace pf\log\build;

use pf\config\Config;
use pf\diropt\Diropt;

class Base
{
    protected $dir;
    protected $log = [];

    public function __construct()
    {
        $this->dir(Config::get('log.dir'));
    }

    public function dir($dir)
    {
        Diropt::create($dir);
        $this->dir = realpath($dir);
        return $this;
    }

    public function record($message, $level = self::ERROR)
    {
        $this->log[] = date("[ c ]") . "{$level}: {$message}" . PHP_EOL;
        return true;
    }

    protected function save()
    {
        if ($this->log) {
            $file = $this->dir . '/' . date('Y_m_d') . '.log';
            return error_log(implode("", $this->log), 3, $file, null);
        }
    }

    public function write($message, $level = 'ERROR')
    {
        $file = $this->dir . '/' . date('Y_m_d') . '.log';
        return error_log(date("[ c ]") . "{$level}: {$message}" . PHP_EOL, 3, $file, null);
    }

    public function __destruct()
    {
        //记录日志
        $this->save();
    }
}