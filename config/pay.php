<?php

return [
    'alipay' => [
        // 支付宝分配的 APPID
        'app_id' => env('ALI_APP_ID', 2016102100733674),

        // 支付宝异步通知地址
        'notify_url' => '',

        // 支付成功后同步通知地址
        'return_url' => '',

        // 阿里公共密钥，验证签名时使用
        'ali_public_key' => env('ALI_PUBLIC_KEY', 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAn8DzK1SfnryfFcKYphYFKXjvSvzaJCKfXR/jP3MLQqkYCU9b2OgwPbHQj048oG6k5Zr3pPU8zUuOTdc+Ol9fx8u5f7G38KC4My9z8uOkCrkguvemPPBYa5mZQgUbQbwFLUAOgAvBptWPrJTcf5j+TROat1ykPtCM1Wuf0+Kf3JAyKfhRQxYL54dpYkMRvZGbedKneekzgkhXo1hoikX3pPtEMdDZ9zrSEVt4oHPTK7ATBqV9jpfjoD8ZvPmQPZPIcWcbYG10yGFSMZMvsTAWGO5fJ4GNKwy+OyxbF6Lghd6rdVhFzyHg9difL7sDEO+NR/kFyoyNUpI3Wsm9gyf6mwIDAQAB'),

        // 自己的私钥，签名时使用
        'private_key' => env('ALI_PRIVATE_KEY', 'MIIEogIBAAKCAQEAkESY8U5WV9fD359D+9LC2yNcLdVvWlftMuXlU7Zz31OF8EMHXBbWxs06kNvsfujz9QQ5thbC6Huv+8VILHW++fIq3ui0+Hm+qvl0mHJd1pFmg2YC4S7ddteff2mxkDbiNuUMJQlqIeABIpP3swzHULlsw4YTsqA98X+RgYYASBaMGO0ygV4eNfsrg7yvrkb786DHTcD8/LU36LWxRcrADCM8vkvhRrokRi7puWRYCcZps4YepgHHRSgKE2yuM7MnrMeEd5cG+1sFeGV4T20S19h52DdpI7ScgSGnqechKpgYOnWSh3P4P9taEMpb17SF91bKttM56cDa60kfNBG6rwIDAQABAoIBAFBHq+gT1J5bNedZpCYc2UvCeIgUzjsy1I7POXcE/6PVwaG6Wv0WxHuqNp3nk8nnbeH5cPfv4JQoR/zNgmUjPJuv88VJL3NZpA1WdVhjw+4jySzzdkTCpIB+aoYnVaTPtcAgY0q023dwRJFuT5c2VC+Kj4iaMpni67VYbKrr23pBIS94vouBQNR3nsyleQ/wWdyFR4oCgwO0RjHZuhjbMteZ/ftZbSN49V4ANMVqCvUWLBMitVEuoMAzzsfRUrGivedMsc2VJT2MANemgs6KXvaVQQLIr0zNVTYKsH6dbBd5Q9UQY2IBDzbPxnaGlEX3fgCXgwkB1TlZjOmOzsgtMIECgYEA4S1IwspFG3OeAetW1vhbpuNuV+DC10QqOgU2Ec25hzZg7sE4POUzLIV1l0TW5wpIHoTpMu92kFGqGNuu94WPtetcuSbosieEovxwBRF0E73C8+Wlt0GI4JCVe922nmNh1+VogQOppaQLmbku13pyf/fL/paL4n258D+OmHr70W8CgYEApAQUCOrlrkBifRBwa5DooZB+jlhnW5v6WGgEJ4xNiXw7PgYCiCJyp21Y7gGw7FUh3Vt6JjHSzwMgunIqO+SCetFP/9r5xdw3mrFs0PfdtSEIMhyI59ji60qo3Rrmyt0hvqYSBzbWc31YpZaS0/+eBfgz+UtBA+E1Mgn4MthdisECgYBpABTNwEQ5aNBlVLhJxcX3LFZn5Ab3GnIWXBe6dZPt2Q2aR79Rpg8W06ThxNfxJHo8wP19IuzGn04SCV6tTTqWOgoizGH1sTfISK5zro/SJMqjsJJ1wblx/fm2qMxfTzhw1CjHAE47TyOZqyCMmiyKP6KANPNFyhrKTNjRgYerQQKBgCuPobqUmJflJcNNoG4ROJfghpxLwnfEP4NHbQML8nP3eMyKUBXUAFuTYTElZdX+7lWaPCD0zqaIkCK0u57YnAb+nJ65i+kPCf2d7ea6TjoTIdgdWAcrxWj0lVDUGkP640F9XgBogiB+RBMGoMyJcXDocPVfFU9weu5lU3Q9nuqBAoGAYWCupCQvhnGrWk+b+a4zJzTaUeIx9bFlsWNCHSDeqH9rWiz7wP362Plb7ckty5dKncXU0TQYuXyghuy9YDbFWIbG6Nm/WWHGK1Lnb5kNpgJt6tsNNnjczrlr3xfcrJoaPEwUUcjkkw0u951JOiQ5Khjc76oB5fcEkX1bOZiKCR4='),

        // 使用公钥证书模式，请配置下面两个参数，同时修改 ali_public_key 为以 .crt 结尾的支付宝公钥证书路径，如（./cert/alipayCertPublicKey_RSA2.crt）
        // 应用公钥证书路径
        // 'app_cert_public_key' => './cert/appCertPublicKey.crt',

        // 支付宝根证书路径
        // 'alipay_root_cert' => './cert/alipayRootCert.crt',

        // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
        'log' => [
            'file' => storage_path('logs/alipay.log'),
        //  'level' => 'debug'
        //  'type' => 'single', // optional, 可选 daily.
        //  'max_file' => 30,
        ],

        // optional，设置此参数，将进入沙箱模式
        // 'mode' => 'dev',
    ],

    'wechat' => [
        // 公众号 APPID
        'app_id' => env('WECHAT_APP_ID', ''),

        // 小程序 APPID
        'miniapp_id' => env('WECHAT_MINIAPP_ID', ''),

        // APP 引用的 appid
        'appid' => env('WECHAT_APPID', ''),

        // 微信支付分配的微信商户号
        'mch_id' => env('WECHAT_MCH_ID', ''),

        // 微信支付异步通知地址
        'notify_url' => '',

        // 微信支付签名秘钥
        'key' => env('WECHAT_KEY', ''),

        // 客户端证书路径，退款、红包等需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_client' => '',

        // 客户端秘钥路径，退款、红包等需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_key' => '',

        // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
        'log' => [
            'file' => storage_path('logs/wechat.log'),
        //  'level' => 'debug'
        //  'type' => 'single', // optional, 可选 daily.
        //  'max_file' => 30,
        ],

        // optional
        // 'dev' 时为沙箱模式
        // 'hk' 时为东南亚节点
        // 'mode' => 'dev',
    ],
];
