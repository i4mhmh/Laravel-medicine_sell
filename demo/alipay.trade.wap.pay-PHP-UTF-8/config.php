<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016102100733674",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCC3zbicnd8vxxCSaRFJKvlqR8lydkahC9Cj9Z1M5HVY24DWrdAvYDObyjt8YLuyInDzIfbK6KslkkpNzKYAdOO3Na+gcaIX1x4VJK2famzlpG3pSX4o1P2uQoEXPFqgIqCq2DcKpmsm0OhbMadZpa8IC9i9d9OQv6PFL4frKsIkzQdf6EQUmYZnNbdekZjTVUDHzxiLlhb81dyPNTRNmp0jLLk8Xzu+MhWtJC/jNcMChmewsbUjKnbvSqGCwcu06g1g1A0t8sammC3zLrJ/RwKgwq75MwJfzbdHBerg1LmsVI5w/TzGYBnK+8lJwLjVJHwKrpxem52ByWpOW5/LDHBAgMBAAECggEARVMwo6u3F+G0enjAB9BxLmr0EPRniOBUmJHRLKxwp/TPpf8765N20+OWbtTsYsjgEVQa80KeHYZOowKWTmdJRfg92RStsjexqBxEy16tsnAkKH/XKWp7Y8qJP95sE9qbhLR7zqTSWti0bqJMY7ygRG9YKrfL3o0mg2ydefHhd9ye26AwU0Kg5OQ5PRnCwJGecAJO0+NxYFuZsCBVKVGH30eqvgg2Xmr1d6Nu1SiqKpBkZfxL63POA91CuABcaJEy2+50Wb4ec5lAY4BqYGF5YGo3vbPtfvHUhpdndfZl7dDIYOqf/fCCP7nXeyyv3M8RGacjrH7pNmPvgSToSKPfQQKBgQDPpdlDLSVad/3am53cLieTQ+fhuTqLxynIZPvElOh7/zXp03uv7Joj58lmjMlx5ZNm0FFI0tZxPIQ+lfvjwEkK5/JOMjA8QTNiMno/g37OQjs38PWAj0esjiArjXdjXEgzqn+9etd81M047xrWb2CXh6SqdT3bOyrp08zl8rulFQKBgQChWKf1vUfbSkYRODGK9gWzk51rqcp+pygM6lC+/XUBayqGmZ+nQ4wRWDqrTM/3MWrgxh7FH+OEV4WQXw+qk+5gNRqqdn3SnpapH3cDixLk6I1+ModidqchHvbdAU2nmN+XMA8lU0P9I8l3I+Bg4vxXUSGWbtdFhs4mYbxXIWzc/QKBgAmH0zECIXTFjSE7g0NX2vknZL03gzhnK8PG3sdnDkSishbJXiP0+B4txVCvpY9Uui894H03MCCCZo940tbhPHkDrFtqckxRscoQBwxjPK6623z10k7URLXm0BMvqwskcSvt528K9FkGa2TxlInDEuvhje1E9FHbpVyWHBFx0qsBAoGASZB7nD6+GY0G32kIpbxAoz0FxIX47sBWMXVQdZRomcn77Lz0nzXcEjhxH5N5KtLcUTnj46sDeF7TZh0BrpueTz1HODuoaLSoKtpO0E3Dwp0JjmWJdup0j1Rn6CJk/qpkH7Ho5fLOCAgeHnU8I9C6jzFNqCJHgsrRCYz8a5mw4h0CgYEAmM4UCx0dEKaxW3N9+HKydpd05jyNNWjN/tc1n5kT288XjZoC8/yK4v6W8AcWxClK2YMKOpSaIeWVoRxdbHNUifKTLVVnMEV8H5e5/zv6U+PRA0qAFY4tURWfK+W97ZfX/azAmngmF9KO+vd4r3SaMSwAQ2MG30p9kKcNdhb5pPo=",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB
		",
		
	
);