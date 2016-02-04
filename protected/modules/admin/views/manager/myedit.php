<script type="text/javascript" src="/statics/plugins/jquery.validate.js"></script>
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

                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">更新</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("input[name='manager[mobile]']").blur(function(){
            $(this).validate(['mobile']);
        })
        $("form").submit(function(){
            validateResult = true;
            $("input[name='manager[mobile]']").validate(['mobile']);
            return validateResult
        })
    })
</script>