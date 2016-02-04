<script type="text/javascript" src="/statics/plugins/jquery.validate.js"></script>
<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'manager'))?>
<div class="tab-content">
    <div class="tab-pane active">
        <form name='goods' class="form-horizontal well" enctype="multipart/form-data" action="" method='post'>
            <input type="hidden" value="<?php echo $manager['id']; ?>" name="manager[id]" />
            <fieldset>
                <div class="control-group">
                    <label class="control-label">用户名:</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $manager['name']; ?>" readonly="readonly" class="span3">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">电话:</label>
                    <div class="controls">
                        <input value="<?php echo !empty($manager['mobile'])? $manager['mobile'] : ''; ?>" type="text" name='manager[mobile]' class="span3">
                        <p class="help-block"></p>
                    </div>
                </div>

                <?php if (!empty($sp)) : ?>
                <div class="control-group">
                    <label class="control-label">特殊权限:</label>
                    <div class="controls">
                        <?php $i = 0; ?>
                        <?php foreach ($sp as $key => $value) { ?>
                            <label><input <?php echo !empty($manager['sp']) && in_array($key, $manager['sp']) ? 'checked' : ''; ?> type="checkbox" value="<?php echo $key; ?>" name="manager[sp][<?php echo ++$i; ; ?>]" /><?php echo $value; ?></label>
                        <?php } ?> 
                        <p class="help-block"></p>
                    </div>
                </div>
                <?php endif; ?>

                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">更新</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        // $("input[name='manager[mobile]']").blur(function(){
        //     $(this).validate(['mobile']);
        // })
        // $("form").submit(function(){
        //     validateResult = true;
        //     $("input[name='manager[mobile]']").validate(['mobile']);
        //     return validateResult
        // })
    })
</script>