<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Houdunwang\Alipay;

use houdunwang\Alipay\Build\Base;

/**
 * 支付宝
 * Class AliPay
 *
 * @package houdunwang\alipay
 */
class AliPay
{
    protected static $link;

    //配置
    protected static $config;

    public static function config(array $config)
    {
        self::$config = $config;
    }

    /**
     * @return array
     */
    public static function getConfig($name)
    {
        return self::$config[$name];
    }

    public function __call($method, $params)
    {
        if (is_null(self::$link)) {
            self::$link = new Base();
        }

        return call_user_func_array([self::$link, $method], $params);
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([new static(), $name], $arguments);
    }
}