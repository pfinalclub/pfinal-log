<?php


/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2019/2/27
 * Time: 13:01
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

use pf\config\Config;
use pf\log\Log;

class BaseTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        parent::setUp();
        Config::set('log.dir', 'log');
    }

    public function testWrite()
    {
        $s = Log::write('baidu.com', Log::ERROR);
        $this->assertTrue($s);
    }

    public function testRecord()
    {
        $s = Log::record('sina.com', Log::FATAL);
        $this->assertTrue($s);
    }
}

