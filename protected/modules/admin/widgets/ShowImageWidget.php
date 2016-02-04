<?php
/**
 * @author wanthings.com chengx nixgnehc@gmail.com
 * 
 * 使用fancybox显示图片.
 * 依赖jquery.
 * 使用方法:
 * 在html 标签上面设置class wx_siw, 并为标签添加属性 wx_siw_url(图片地址)
 * 例如: <a href="*" class="wx_siw *" wx_siw_url="http//www.wanthings.com"></a> 
 * 备注: '*' 代表通配符,任意string.
 * 
 */
class ShowImageWidget extends CWidget
{
    public function init()
    {

    }

    public function run()
    {
        $this->render('showImage');
    }
}