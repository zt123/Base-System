<?php
/**
 * @author wanthings.com chengx nixgnehc@gamil.com
 * 最好每个项目不同的key
 */
class McryptComponent
{
    const cipher = MCRYPT_DES;
    const modes = MCRYPT_MODE_ECB;
    const key_length = 8;
    const key = 'eiwxwcx';
    /**
     * 加密
     * @param  [type] $str [description]
     * @return [type]      [description]
     */
    public static function encryption($str)
    {
        $result = null;
        //$key = Yii::app()->params['pdKey'];
        $key = self::key;
        if (strlen($key) > self::key_length) {
            $key = substr($key, 0, self::key_length);
        }
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(self::cipher,self::modes),MCRYPT_RAND);
        $result = mcrypt_encrypt(self::cipher, $key, trim($str), self::modes, $iv);
        $result = base64_encode($result);
        return $result;
    }

    /**
     * 解密
     * @param  [type] $str [description]
     * @return [type]      [description]
     */
    public static function decryption($str)
    {
        $result = null;
        //$key = Yii::app()->params['pdKey'];
        $key = self::key;
        if (strlen($key) > self::key_length) {
            $key = substr($key, 0, self::key_length);
        }
        $result = base64_decode(trim($str));
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(self::cipher,self::modes),MCRYPT_RAND);
        $result = trim(mcrypt_decrypt(self::cipher, $key, $result, self::modes, $iv));
        return $result;
    }
}

?>