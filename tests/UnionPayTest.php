<?php

use Labs7IN0\UnionPay\UnionPay;

class UnionPayTest extends PHPUnit_Framework_TestCase {

  public function testUnionPayHasCheese()
  {
    $unionpay = new UnionPay;
    $this->assertTrue($unionpay->hasCheese());
  }

}
