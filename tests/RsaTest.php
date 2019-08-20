<?php
namespace Haozi\Encryption\Tests;

use Haozi\Encryption\Rsa;
use PHPUnit\Framework\TestCase;

class RsaTest extends TestCase
{

    public function testGetRsa()
    {
        //公钥加密私钥解密
        $rsa = new Rsa(__DIR__.'/fixtures/php_public.pem',__DIR__.'/fixtures/php_private.pem');
        $data = 'abc123';
        $endata = $rsa->encryptByPublicKey($data);
        $dedata = $rsa->decryptByPrivateKey($endata);
        $this->assertSame($dedata,$data);

    }

}
