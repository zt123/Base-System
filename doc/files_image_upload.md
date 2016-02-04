
文件、图片相关配置：
config/main.php 修改 urlManager

'rules'=>array(
//    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
//    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
      'images/<name>'=>'files/image',
      'download/<name>'=>'files/index',
),

注意：注释掉前面3条;

使用说明:

文件、图片上传下载相关
		
	上传文件：

		$bhv = new FilesComponent;
		$result = $bhv->upload('upload_input_name');
		if(!$result)
			echo $bhv->error;	//出错原因

		$result：
			失败：
				false
			成功：
				Array
				(
					[id] => 27
					[hash] => 2d5d004debb7cd7e12a464de8b112d55
					[name] => abc.jpg
					[size] => 90058
					[type] => image/jpeg
					[extension] => jpg
				)

	下载文件：
		url:/download/$hash





图片模块使用相关

	允许格式：jpg、jpeg、jpe、gif、png
	
	图片URL生成方式：
		非加密：
			FilesComponent::getImageUrl($hash,$width=0,$height=0,$cut=false);

		加密：
			FilesComponent::getImageEncryptUrl($hash,$width=0,$height=0,$cut=false);


	访问原图：
		url:/images/$hash.jpg

	URL参数说明：
		w	--width 宽度，后面跟像素值。
		h	--height高度，后面跟像素值。
		c	--cut	切图，值有top、bottom、left、right、middle，默认middle。代表开始切图位置。

	例子：
		限制单边高或宽,等比例输出图片:
			url:/images/$hash_w-300.jpg	//限制宽度300px
			url:/images/$hash_h-300.jpg //限制高度300px

		同时限制高和宽,等比例切图或补图:
			url:/images/$hash_w-300_h-300.jpg	//等比缩放，空白部分填补白色。
			url:/images/$hash_h-300_h-300_c.jpg //等比缩放，图片从中间切出。
			url:/images/$hash_h-300_h-300_c-top.jpg //等比缩放，图片从头部开始切出。


