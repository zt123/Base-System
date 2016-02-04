<?php

/*
 *	经纬度计算 Class
 *	author	yanxf <walkfine@gmail.com>
 *	version	mocube_3.0
 */

class LBS{
	const R = 6378137;
	//单位为米
	public static function getDistance($lng1,$lat1,$lng2,$lat2)//根据经纬度计算距离
	{
		//将角度转为狐度 
		$radLat1 = deg2rad($lat1);
		$radLat2 = deg2rad($lat2);
		$radLng1 = deg2rad($lng1);
		$radLng2 = deg2rad($lng2);
		$a = $radLat1-$radLat2;//两纬度之差
		$b = $radLng1-$radLng2;//两经度之差
		$s = 2*asin(sqrt(pow(sin($a/2),2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)))*self::R;
		return  round($s);
	}

	/*
	输入
		$params['latitude']		//纬度
		$params['longitude']	//经度
		$params['range']		//范围 单位 米
	输出
		$result['min_latitude']
		$result['max_latitude']
		$result['min_longitude']
		$result['max_longitude']

	Latitude 	// 纬度
	Longitude	// 经度
	Coordinate	// 坐标

	推导出的经度计算公式
	$longitude = rad2deg(asin(sin($range/R)/cos(deg2rad($latitude))))

	*/
	//获取经纬度范围
	public static function getRange($params)
	{
		if(empty($params['range']))
			$params['range'] = 1000;

		if(!isset($params['latitude']) || !isset($params['longitude']) || !isset($params['range']))	return false;
		$latitude = $params['range']/111319.55;
		$result['min_latitude'] = number_format($params['latitude']-$latitude,6);
		$result['max_latitude'] = number_format($params['latitude']+$latitude,6);
		
	//	$longitude = $params['range']/(111319.55*cos($params['latitude']))*0.817;//0.86修正数
		$longitude = rad2deg(asin(sin($params['range']/self::R)/cos(deg2rad($params['latitude']))));

		$result['min_longitude'] = number_format($params['longitude']-$longitude,6);
		$result['max_longitude'] = number_format($params['longitude']+$longitude,6);

		if($result['min_latitude'] < -90)
			$result['min_latitude'] = -90.000000;
		if($result['max_latitude'] > 90)
			$result['max_latitude'] = 90.000000;
		if($result['min_longitude'] < -180)
			$result['min_longitude'] = -180.000000;
		if($result['max_longitude'] > 180)
			$result['max_longitude'] = 180.000000;
	
		return $result;
	}
}
?>
