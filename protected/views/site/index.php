	<div id="banner">
		<div class="element_bg select" style="background-image:url(/statics/images/newbanner_bg1.jpg)">
			<div class="element png" style="background-image:url(/statics/images/newbanner_1.png)">
				<h1>门户网站建设</h1>
				<p>网信拥有经验丰富的高级网站建设工程师和一流的网页设计人员，具备各种规模与类型网站建设的雄厚实力， 在网站建设领域树立了自己独特的设计风格。目前为近千家客户提供了网站设计及建设服务。</p>
				<a href="/article/service">了解更多</a>
			</div>
		</div>
		<div  class="element_bg " style="background-image:url(/statics/images/newbanner_3bg.png)">
			<div class="element png" style="background-position:100% 0;background-image:url(/statics/images/newbanner_3.png)">
				<h1>电子商务解决方案</h1>
				<p>凭借对电子商务的深刻理解和丰富的实战经验，我们前瞻性地钻研了具有自主核心技术和知识产权的B2B/C电子商务软件及贴合用户需求的定制化开发服务，全面帮助企业构建和提升在社会化浪潮下的竞争优势，获得了广大用户的青睐。</p>
				<a href="/article/service">了解更多</a>
			</div>
		</div>
		<div  class="element_bg " style="background-image:url(/statics/images/yx_bg.png)">
			<div class="element png" style="background-position:100% 0;background-image:url(/statics/images/newbanner_2.png)">
				<h1>网络营销推广</h1>
				<p>网信以企业网站营销结果为核心、以 搜索引擎良好表现、较高的网站曝光率为标准，为客户提供高质量的网络 营销服务，从而为客户赢得更多的商业机会和销售利润，助力客户拓展网络市场。</p>
				<a href="/article/service">了解更多</a>
			</div>
		</div>
<!--
		<div  class="element_bg " style="background-image:url(/statics/images/banner_bg2.jpg)">
			<div class="element png" style="background-position:100% 0;background-image:url(/statics/images/20120830015430148.png)">
				<h1>电子商务解决方案</h1>
				<p>凭借对电子商务的深刻理解和丰富的实战经验，我们前瞻性地钻研了具有自主核心技术和知识产权的B2B/C电子商务软件及贴合用户需求的定制化开发服务，全面帮助企业构建和提升在社会化浪潮下的竞争优势，获得了广大用户的青睐。</p>
				<a href="#">了解更多</a>
			</div>
		</div>
		<div  class="element_bg " style="background-image:url(http://www.ruifox.com/resouce/images/banner_bg8.jpg)">
			<div class="element png" style="background-position:100% 0;background-image:url(http://images.ruifox.com/2012/0830/20120830015726137.png)">
				<h1>网络营销推广</h1>
				<p>网信以企业网站营销结果为核心、以 搜索引擎良好表现、较高的网站曝光率为标准，为客户提供高质量的网络 营销服务，从而为客户赢得更多的商业机会和销售利润，助力客户拓展网络市场。</p>
				<a href="#">了解更多</a>
			</div>
		</div>
		<div  class="element_bg " style="background-image:url(http://www.ruifox.com/resouce/images/banner_bg3.jpg)">
			<div class="element png" style="background-position:100% 0;background-image:url(http://images.ruifox.com/2012/0830/20120830015446637.png)">
				<h1>网络营销推广</h1>
				<p>网信以企业网站营销结果为核心、以 搜索引擎良好表现、较高的网站曝光率为标准，为客户提供高质量的网络 营销服务，从而为客户赢得更多的商业机会和销售利润，助力客户拓展网络市场。</p>
				<a href="#">了解更多</a>
			</div>
		</div>
		<div  class="element_bg " style="background-image:url(http://www.ruifox.com/resouce/images/banner_bg4.jpg)">
			<div class="element png" style="background-position:100% 0;background-image:url(http://images.ruifox.com/2012/0830/20120830015615324.png)">
				<h1>网络营销推广</h1>
				<p>网信以企业网站营销结果为核心、以 搜索引擎良好表现、较高的网站曝光率为标准，为客户提供高质量的网络 营销服务，从而为客户赢得更多的商业机会和销售利润，助力客户拓展网络市场。</p>
				<a href="#">了解更多</a>
			</div>
		</div>
-->
		<div id="icon_position">
			<span class="icon png select"></span>
			<span class="icon png"></span>
			<span class="icon png"></span>
		</div>
	</div>

<script>

	$("#icon_position .icon").click(function(){
		var i = $("#icon_position .icon").index($(this));
		var time = 800
		$(".element_bg.select").fadeOut({duration:600,easing:'linear',complete:function(){
			$(this).removeClass('select');
		}});
		$(".element_bg").eq(i).delay(200).fadeIn(600,'linear',function(){});

		$(".element_bg.select").children('.element').fadeOut(800,'linear').animate( { backgroundPosition: "60% 0"}, {  easing:'linear',queue: false, duration: 800 ,complete:function(){
			$(this).css('background-position','100% 0');
		}} );
		$(".element_bg").eq(i).children('.element').delay(300).fadeIn(800,'linear').animate( { backgroundPosition: "80% 0"}, {  easing:'linear',queue: false, duration: 800,complete:function(){
			$(this).parent().addClass('select');
		} } );

		$(".element_bg.select").children('.element').children('h1').animate( { 'padding-top': "200px"}, {  easing:'linear',queue: false, duration: 800 ,complete:function(){
			$(this).css('padding-top','0').next('p').css('margin-top','0').next('a').css('margin-top','0');
		}} );
		$(".element_bg").eq(i).children('.element').children('h1').animate( { 'padding-top': "100px"}, {  easing:'linear',queue: false, duration: 800 } ).next('p').animate( { 'margin-top': "35px"}, {  easing:'linear',queue: false, duration: 800 }).next('a').animate( { 'margin-top': "35px"}, {  easing:'linear',queue: false, duration: 800 } );



		$("#icon_position .icon").removeClass('select');
		$(this).addClass('select');
	});
	
	$('#banner').hover(function(){
		clearInterval(step);
	},function(){
		step = setInterval(slider,3000);
	})



	step = setInterval(slider,3000);
function slider()
{
	if($("#icon_position .icon").index($("#icon_position .icon.select")) != $("#icon_position .icon").index($("#icon_position .icon:last")))
	{
		$("#icon_position .icon.select").next('span').click();
	}else
		$("#icon_position .icon").eq(0).click();
}

</script>






<div class="our_service">
<div class="content png">
	<div class="element hover">
		<h1>尊享定制服务</h1>
		<div class="icon icon_1 png"></div>
		<p>量身定制的才是最好的，根据您的具体需求，我们为您提供最适合，最完美的WEB解决方案。</p>
		<a href="/article/service">了解更多</a>
	</div>
	<div class="element">
		<h1>各类网站制作</h1>
		<div class="icon icon_2 png"></div>
		<p>现今，了解一个企业，往往是从企业的网站开始。企业网站的形象很大程度上决定了客户对企业的第一映像。</p>
		<a href="/product">快速建站</a>
	</div>
	<div class="element">
		<h1>网络营销推广</h1>
		<div class="icon icon_3 png"></div>
		<p>网站只是平台，推广才是关键。通过推广，让潜在的客户，第一时间找到您、了解您。</p>
		<a href="/article/service">了解更多</a>
	</div>
	<div class="element">
		<h1>移动网站建设</h1>
		<div class="icon icon_4 png"></div>
		<p>手机网站是另一个互联网，企业建设手机网站，将比电脑上网拥有更大的消费群体。</p>
		<a href="/article/service">了解更多</a>
	</div>
</div>
</div>

<script>
$(function(){
	$(".our_service .content .element").hover(function(){
		$(".our_service .content .element.hover").stop().animate({color:'#616161'},200);
		$(this).stop().animate({color:'#ffffff'},300);
		$(".our_service .content .element.hover").removeClass('hover');
		$(this).addClass('hover');
		var i =  $(".our_service .content .element").index($(this));		
		switch(i)
		{
			case 0:
				$(".our_service .content").stop().animate( { backgroundPosition: "30px 0"}, {queue: false, duration: 200 ,complete:function(){
					//$this.addClass('hover');
				}});
				break;
			case 1:
				$(".our_service .content").stop().animate( { backgroundPosition: "330px 0"}, {  duration: 200 } );
				break;
			case 2:
				$(".our_service .content").stop().animate( { backgroundPosition: "630px 0"}, {  duration: 200 });
				break;
			case 3:
				$(".our_service .content").stop().animate( { backgroundPosition: "930px 0"}, {  duration: 200 });
				break;
		}
		
	},function(){
	});
});
</script>





<?php $this->widget('IndexCaseWidget');?>





<div class="allbody customer_bg">
	<div class="customer">
		<h1>客户 Our Client</h1>
		<h2>We Are Providing Services For Them</h2>
		<a class="trigger" href="#">
			<div class="thumb_wrap" id="thumb-1">
				<img src="/statics/images/1.png" class="index_thumb png" style="opacity: 0.2;">
			</div>
		</a>
		<a class="trigger" href="#">
			<div class="thumb_wrap" id="thumb-2">
				<img src="/statics/images/2.png" class="index_thumb png" style="opacity: 0.2;">
			</div>
		</a>
		<a class="trigger" href="#">
			<div class="thumb_wrap" id="thumb-3">
				<img src="/statics/images/3.png" class="index_thumb png" style="opacity: 0.2;">
			</div>
		</a>
		<a class="trigger"  alt="九龙商城" title="九龙商城"  href="http://www.jiulongbuy.com">
			<div class="thumb_wrap" id="thumb-4">
				<img src="/statics/images/4.png" class="index_thumb png" alt="九龙商城" title="九龙商城" style="opacity: 0.2;">
			</div>
		</a>
		<a class="trigger" alt="Mo立方" title="Mo立方" href="http://www.molifang.com">
			<div class="thumb_wrap" id="thumb-5">
				<img src="/statics/images/5.png" class="index_thumb png"  alt="Mo立方" title="Mo立方"  style="opacity: 0.2;">
			</div>
		</a>
		<a class="trigger" href="#">
			<div class="thumb_wrap" id="thumb-6">
				<img src="/statics/images/6.png" class="index_thumb png" style="opacity: 0.2;">
			</div>
		</a>
		<a class="trigger"  alt="荷花池网" title="荷花池网" href="http://www.ehehua.cn">
			<div class="thumb_wrap" id="thumb-7">
				<img src="/statics/images/7.png" alt="荷花池网" title="荷花池网" class="index_thumb png" style="opacity: 0.2;">
			</div>
		</a>
		<a class="trigger" alt="摩宝网络" title="摩宝网络" href="http://www.mobo360.com/">
			<div class="thumb_wrap" id="thumb-8">
				<img src="/statics/images/8.png" class="index_thumb png" alt="摩宝网络" title="摩宝网络" style="opacity: 0.2;">
			</div>
		</a>
		<a class="trigger" href="#">
			<div class="thumb_wrap" id="thumb-9">
				<img src="/statics/images/9.png" class="index_thumb png" style="opacity: 0.2;">
			</div>
		</a>
		<a class="trigger"  alt="中国电信" title="中国电信" href="#">
			<div class="thumb_wrap" id="thumb-10">
				<img src="/statics/images/10.png" alt="中国电信" title="中国电信" class="index_thumb png" style="opacity: 0.2;">
			</div>
		</a>
	</div>
</div>
<script type="text/javascript">

$(document).ready(function(){
	
	$(".thumb_wrap img").fadeTo("fast", 0.2); // This sets the opacity of the thumbs when the page loads

	$(".thumb_wrap img").hover(function(){
		$(this).fadeTo("fast", 1.0); // This sets the opacity on hover
		
	},function(){
	   	$(this).fadeTo("fast", 0.2); // This sets the opacity on mouseout
   		
	});
		
	$(".thumb_wrap").mouseover(function(){
  			$(this).sprite({ fps: 30, no_of_frames: 14, play_frames: 7 });
    	}).mouseout(function(){
  			$(this).sprite({ fps: 30, no_of_frames: 14, start_at_frame: 7, play_frames: 7 });
    	});
});
		
</script>


<div class="contact_us">
		<h1>联系我们 Contact Us</h1>
		<h2>You can always get help here</h2>
		<div class="content">
			<a class="map png" href="/contact"></a>
			<p><span class="icon_addr png"></span><span>成都市高新西区西芯大道4号创新中心A208</span></p>
			<p><span class="icon_phone png"></span><span>028-66259225</span></p>
			<p><span class="icon_more png"></span><span><a href="/contact">更多联系方式</a></span></p>
		</div>
</div>

<?php $this->widget('IndexArticleWidget');?>

