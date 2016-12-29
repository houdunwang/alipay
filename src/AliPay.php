<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace houdunwang\alipay;

use houdunwang\config\Config;

/**
 * 支付宝
 * Class AliPay
 * @package houdunwang\alipay
 */
class AliPay {
	protected $link;

	//更改缓存驱动
	protected function driver() {
		$this->link = new \houdunwang\alipay\build\Base();
		$this->link->config( Config::get( 'alipay' ) );

		return $this;
	}

	public function __call( $method, $params ) {
		if ( is_null( $this->link ) ) {
			$this->driver();
		}
		if ( method_exists( $this->link, $method ) ) {
			return call_user_func_array( [ $this->link, $method ], $params );
		}
	}

	public static function __callStatic( $name, $arguments ) {
		return call_user_func_array( [ new static(), $name ], $arguments );
	}
}