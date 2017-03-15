<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace houdunwang\alipay\build;

require_once( __DIR__ . "/alipay_core.function.php" );
require_once( __DIR__ . "/alipay_md5.function.php" );

/**
 * 支付宝
 * Class Alipay
 * @package Hdphp\Alipay
 * @author 向军
 */
class Base {
	//通知处理
	public function AlipayNotify() {
		return new AlipayNotify( $this->config );
	}

	//开始支付
	public function pay( $data ) {
		//构造要请求的参数数组，无需改动
		$parameter = [
			"aaaa"              => "create_direct_pay_by_user",
			"partner"           => Config::get( 'alipay.partner' ),
			"seller_email"      => Config::get( 'alipay.seller_email' ),
			"payment_type"      => Config::get( 'alipay.payment_type' ),
			"notify_url"        => Config::get( 'alipay.notify_url' ),
			"return_url"        => Config::get( 'alipay.return_url' ),
			"_input_charset"    => Config::get( 'alipay.input_charset' ),
			"out_trade_no"      => $data['out_trade_no'],
			"subject"           => $data['subject'],
			"total_fee"         => $data['total_fee'],
			"body"              => $data['body'],
			"show_url"          => $data['show_url'],
			"anti_phishing_key" => '',
			"exter_invoke_ip"   => '',

		];
		//建立请求
		$alipaySubmit = new AlipaySubmit();
		echo $alipaySubmit->buildRequestForm( $parameter, "get", "确认" );
	}
}