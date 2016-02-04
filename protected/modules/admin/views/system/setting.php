<div class="tab-content">
    <div class="tab-pane active">
        <form name='goods' class="form-horizontal well" enctype="multipart/form-data" action="" method='post'>
            <fieldset>
                <div class="control-group">
                    <label class="control-label">站点名称:</label>
                    <div class="controls">
                        <input type="text" name='name' value="<?php echo empty($name)?'':$name;?>" class="span3">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">站点描述:</label>
                    <div class="controls">
                        <input type="text" name='description' value="<?php echo empty($description)?'':$description;?>" class="span3">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">站点title:</label>
                    <div class="controls">
                        <input type="text" name='title' value="<?php echo empty($title)?'':$title;?>" class="span5">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">站点备案号:</label>
                    <div class="controls">
                        <input type="text" name='icp' maxlength="20" value="<?php echo empty($icp)?'':$icp;?>" class="span3">
                        <p class="help-block">例如：京ICP证030173号</p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">在线商店网址:</label>
                    <div class="controls">
                        <input type="text" name='online_store_address' value="<?php echo empty($online_store_address)?'':$online_store_address;?>" class="span3">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">公司地址:</label>
                    <div class="controls">
                        <input type="text" name='addr' value="<?php echo empty($addr)?'':$addr;?>" class="span5">
                        <p class="help-block"></p>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">图片地址加密密钥:</label>
                    <div class="controls">
                        <input type="text" name='image_key' value="<?php echo empty($image_key)?'':$image_key;?>" class="span2">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">图片地址是否需要加密:</label>
                    <div class="controls">
                        <label class="radio inline"><input type="radio" name="image_path_encrypt" value="0" <?php echo empty($image_path_encrypt)?'checked':'';?>>否</label>
                        <label class="radio inline"><input type="radio" name="image_path_encrypt" value="1" <?php echo empty($image_path_encrypt)?'':'checked';?>>是</label>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">memcache缓存时间:</label>
                    <div class="controls">
                        <input type="text" name='cache_expired' value="<?php echo empty($cache_expired)?'':$cache_expired;?>" class="span2">秒
                        <p class="help-block"></p>
                    </div>
                </div>
                <!-- <div class="control-group">
                    <label class="control-label">客服电话:</label>
                    <div class="controls">
                        <input type="text" name='tel' value="<?php echo empty($tel)?'':$tel;?>" class="span2">
                        <p class="help-block"></p>
                    </div>
                </div> -->
                <div class="control-group">
                    <label class="control-label">客服电话图片</label>
                    <div class="controls">
                        <?php if (!empty($cst)) : ?>
                            <a wx_siw_url="/images/<?php echo $cst; ?>.png" class="wx_siw">查看</a>
                        <?php endif; ?>
                        <input type="file" name='cst' class="span2">
                        <p class="help-block"></p>
                    </div>
                </div>
                <!-- <div class="control-group">
                    <label class="control-label">客户顾问电话:</label>
                    <div class="controls">
                        <input type="text" name='phone' value="<?php echo empty($phone)?'':$phone;?>" class="span2">
                        <p class="help-block"></p>
                    </div>
                </div> -->
                <div class="control-group">
                    <label class="control-label">第三方统计代码:</label>
                    <div class="controls">
                        <textarea  name='stats' rows="5" class="input-xxlarge"><?php echo empty($stats)?'':$stats;?></textarea>
                        <p class="help-block">插入第三方统计代码</p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">百度分享代码:</label>
                    <div class="controls">
                        <textarea  name='baidu_share' rows="5" class="input-xxlarge"><?php echo empty($baidu_share)?'':$baidu_share;?></textarea>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">IM工具代码:</label>
                    <div class="controls">
                        <textarea  name='im' rows="5" class="input-xxlarge"><?php echo empty($im)?'':$im;?></textarea>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">修改</button>
                    <a class="btn" href="/admin/site/setting">取消</a>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<script type='text/javascript'>

$("input[name=online_store_address]").blur(function(){
    $(this).validate(['required', 'url']);
})
//表单验证
$('input[name=title]').blur(function(){
    $(this).validate(['required']);
})
$('input[name=icp]').blur(function(){
    $(this).validate(['required']);
})
$('input[name=cache_expired]').blur(function(){
    $(this).validate(['required','unsignedInteger']);
})

$('form[name=goods]').submit(function(){
    validateResult = true;
    $('input[name=title]').validate(['required']);
    $('input[name=icp]').validate(['required']);
    $('input[name=cache_expired]').validate(['required','unsignedInteger']);
    $("input[name=online_store_address]").validate(['required', 'url']);
    return validateResult;
})


</script>
