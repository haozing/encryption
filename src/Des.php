<?php
namespace Haozi\Encryption;

class Des
{

    private $vi;
    private $meth;
    public function __construct($meth='AES-128-CBC',$vi='bQsLpCRrOsdroXzp')
    {

        $this->vi = $vi;
        $this->meth = $meth;
    }

    /**
     * AES加密
     *
     * 可传入自定义密码
     *
     * $key
     */
    public function encrypt($cleartext,$key = ''){

        $key = empty($key) ? self::$key : $key;

        $encrypted = openssl_encrypt($cleartext, $this->meth, $key, OPENSSL_RAW_DATA, $this->vi);

        return base64_encode($encrypted);

    }

    /**
     * AES解密
     *
     * 可传入自定义密码
     *
     * $key
     */
    public function decrypt($encrypted,$key = ''){

        $key = empty($key) ? self::$key : $key;

        $encrypted = base64_decode($encrypted);

        $decrypted = openssl_decrypt($encrypted,$this->meth, $key, OPENSSL_RAW_DATA,$this->vi);

        return trim($decrypted);
    }
}