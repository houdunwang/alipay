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

use hdphp\kernel\ServiceProvider;

class AliPayProvider extends ServiceProvider {

	//延迟加载
	public $defer = true;

	public function boot() {
		\Alipay::config( C( 'alipay' ) );
	}

	public function register() {
		$this->app->single( 'AliPay', function ( $app ) {
			return new AliPay( $app );
		} );
	}
}