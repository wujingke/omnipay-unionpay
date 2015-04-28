<?php namespace Labs7IN0\UnionPay;

class UnionPayClient {

  public $config = [
    'CVN2_ENC'=> 0, // cvn2加密 1：加密 0:不加密
    'DATE_ENC'=> 0, // 有效期加密 1:加密 0:不加密
    'PAN_ENC'=> 0, // 卡号加密 1：加密 0:不加密
    'ENV' => 'testing', // 默认使用测试环境
    'SIGN_CERT_PATH' => '../cer/testing/PM_700000000000001_acp.pfx', // 签名证书路径
    'SIGN_CERT_PWD' => '000000', // 签名证书密码
    'ENCRYPT_CERT_PATH' => '../cer/testing/verify_sign_acp.cer', // 密码加密证书（预留）
    'VERIFY_CERT_DIR' => '../cer/', // 验签证书路径

    'FRONT_NOTIFY_URL' => '/callback', // 前台通知地址
    'BACK_NOTIFY_URL' => '/notify', // 后台通知地址

    'FILE_DOWN_PATH' => '../file/', // 文件下载目录

    'LOG_FILE_PATH' => '../logs/', // 日志目录
    'LOG_LEVEL' => 'INFO', // 日志级别
  ];

  public function setENC($config)
  {
    if(is_int($config['CVN2_ENC']))
      $this->config['CVN2_ENC'] = $config['CVN2_ENC'];

    if(is_int($config['DATE_ENC']))
      $this->config['DATE_ENC'] = $config['DATE_ENC'];

    if(is_int($config['PAN_ENC']))
      $this->config['PAN_ENC'] = $config['PAN_ENC'];

    return $this;
  }

  public function setENV($ENV)
  {
    if ($ENV == 'production')
      $this->config['ENV'] = 'production';
    else
      $this->config['ENV'] = 'testing';

    return $this;
  }

  public function setCert($config)
  {
    if(is_string($config['SIGN_CERT_PATH']))
      $this->config['SIGN_CERT_PATH'] = $config['SIGN_CERT_PATH'];

    if(is_string($config['SIGN_CERT_PWD']))
      $this->config['SIGN_CERT_PWD'] = $config['SIGN_CERT_PWD'];

    if(is_string($config['ENCRYPT_CERT_PATH']))
      $this->config['ENCRYPT_CERT_PATH'] = $config['ENCRYPT_CERT_PATH'];

    if(is_string($config['VERIFY_CERT_DIR']))
      $this->config['VERIFY_CERT_DIR'] = $config['VERIFY_CERT_DIR'];

    return $this;
  }

  public function getGatewayURL($apiName)
  {
    $host = [
        'testing' => 'https://101.231.204.80:5000',
        'production' => 'https://gateway.95516.com'
      ];

    $APIUrl = [
      'testing' => [
          'FRONT_TRANS' => '/gateway/api/frontTransReq.do', // 前台请求地址
          'BACK_TRANS' => '/gateway/api/backTransReq.do', // 后台请求地址
          'BATCH_TRANS' => '/gateway/api/batchTrans.do', // 批量交易
          'SINGLE_QUERY' => '/gateway/api/queryTrans.do', // 单笔查询请求地址
          'FILE_QUERY' => 'https://101.231.204.80:9080/', // 文件传输请求地址
          'Card_Request' => '/gateway/api/cardTransReq.do', // 有卡交易地址
          'App_Request' => '/gateway/api/appTransReq.do', // App交易地址
        ],
      'production' => [
        'FRONT_TRANS' => '/gateway/api/frontTransReq.do', // 前台请求地址
        'BACK_TRANS' => '/gateway/api/backTransReq.do', // 后台请求地址
        'BATCH_TRANS' => '/gateway/api/batchTrans.do', // 批量交易
        'SINGLE_QUERY' => '/gateway/api/queryTrans.do', // 单笔查询请求地址
        'FILE_QUERY' => 'https://filedownload.95516.com/', // 文件传输请求地址
        'Card_Request' => '/gateway/api/cardTransReq.do', // 有卡交易地址
        'App_Request' => '/gateway/api/appTransReq.do', // App交易地址
        ]
    ];

    if ($apiName == 'FILE_QUERY') {
      return $APIUrl[$this->config['ENV']]['FILE_QUERY'];
    } else {
      return $host[$this->config['ENV']] . $APIUrl[$this->config['ENV']][$apiName];
    }
  }

}
