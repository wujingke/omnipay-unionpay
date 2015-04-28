<?php

use Labs7IN0\UnionPay\UnionPayClient;

class UnionPayClientTest extends PHPUnit_Framework_TestCase {

  public function testUnionPayClientSetENC()
  {
    $unionpayclient = new UnionPayClient;
    $unionpayclient->setENC(['CVN2_ENC' => 1, 'DATE_ENC' => 1, 'PAN_ENC' => 1]);
    $this->assertSame($unionpayclient->config['CVN2_ENC'], 1);
    $this->assertSame($unionpayclient->config['DATE_ENC'], 1);
    $this->assertSame($unionpayclient->config['PAN_ENC'], 1);
  }

  public function testUnionPayClientSetENV()
  {
    $unionpayclient = new UnionPayClient;
    $unionpayclient->setENV('production');
    $this->assertSame($unionpayclient->config['ENV'], 'production');
  }

  public function testUnionPayClientSetCert()
  {
    $unionpayclient = new UnionPayClient;
    $unionpayclient->setCert(['SIGN_CERT_PATH' => 'sign.cer', 'SIGN_CERT_PWD' => '111111', 'ENCRYPT_CERT_PATH' => 'encrypt.cer', 'VERIFY_CERT_DIR' => './cer/']);
    $this->assertSame($unionpayclient->config['SIGN_CERT_PATH'], 'sign.cer');
    $this->assertSame($unionpayclient->config['SIGN_CERT_PWD'], '111111');
    $this->assertSame($unionpayclient->config['ENCRYPT_CERT_PATH'], 'encrypt.cer');
    $this->assertSame($unionpayclient->config['VERIFY_CERT_DIR'], './cer/');
  }

  public function testUnionPayClientGetGatewayURL()
  {
    $unionpayclient = new UnionPayClient;
    $this->assertSame($unionpayclient->getGatewayURL('FRONT_TRANS'), 'https://101.231.204.80:5000/gateway/api/frontTransReq.do');
    $this->assertSame($unionpayclient->getGatewayURL('FILE_QUERY'), 'https://101.231.204.80:9080/');
  }

}
