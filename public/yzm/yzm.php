<?php
header("Content-type: text/html; charset=utf-8"); 
session_start();
//载入ecd类
require_once('lib/Ecd.class.php');
const url = "http://www.etuocloud.com/gateway.action";
const app_key = 'bfQLeUFGf7Mvmpu2H4w4UmS1b07LPTpB';
const app_secret = 'HYFFvYgDqQ3ZmJ1vVTwEaNpGGHpGcQjMlC881tTDnog1ihOsC5aYPnOtm6nRVo8l';
const format = 'json';
//初始化
$ecd = new Ecd(url,app_key,app_secret,format);
//接收客户端手机
$phone = $_POST['id'];
//随机验证码
$code = rand(1000,9999);
//把验证码装入SESSION
$_SESSION["CHECKCODE"] = $code;
//发送验证码短信
echo $ecd->send_sms_code("{$phone}",'1',"{$code}",'');

//发送模板短信
//echo $ecd->send_sms_tpl('接收模板短信的手机号','模板短信模板ID','模板中的参数，以英文逗号分隔','商户订单号，可空');

//发送自定义短信
//echo $ecd->send_sms_custom('接收自定义短信的手机号','自定义短信内容','商户订单号，可空');

//发送语音验证码
//echo $ecd->send_voice_code('接收验证码语音的手机号','语音验证码模板ID','验证码','商户订单号，可空');

//发送语音通知
//echo $ecd->send_voice_notice('接收语音通知的手机号','语音通知模板ID','商户订单号，可空');

//获取流量产品列表
//echo $ecd->get_flow_product_list();

//流量充值
//echo $ecd->recharge_flow('被充值流量的手机号','流量产品编码','商户订单号，可空');




