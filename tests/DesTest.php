<?php
namespace Haozi\Encryption\Tests;

use Haozi\Encryption\Des;
use PHPUnit\Framework\TestCase;

class DesTest extends TestCase
{

    public function testGetDes()
    {
        //公钥加密私钥解密
        $rsa = new Des();
        $data = 'abc123';
        $key = 'ewqrewqrdfads';
        $endata = $rsa->encrypt($data,$key);
        $dedata = $rsa->decrypt($endata,$key);
        $this->assertSame($dedata,$data);

    }
}
