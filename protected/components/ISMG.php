<?php

/*
 *	短信模块 ISMG Internet Short Message Gateway Class
 *	author	yanxf <walkfine@gmail.com>
 *	version	sms_2.0
 */

class ISMG{
	public static function send($content,$number='18608032904')
	{
		if(empty($content))
			return false;
		$url = 'http://sms.daoser.com/sms/send/message/'.urlencode($content).'/phone/'.$number;
		if (self::post($url)==0)
			return true;
		else
			return false;
	}

    protected static function post($url,$data=null,$method=null)
    {
		$output = Curl::post($url,$data,$method);
		return $output['content'];
    }

}
?>
