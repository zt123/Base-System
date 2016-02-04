<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'manager'))?>
<table class='table table-bordered table-striped'>
    <tr>
        <th>账号</th>
        <th>电话</th>
        <th>特殊权限</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    <?php if (!empty($data['managers'])) { ?>
    <?php foreach ($data['managers'] as $manager) { ?>
        <tr>
            <td><?php echo $manager['name']; ?></td>
            <td><?php echo !empty($manager['mobile'])?$manager['mobile'] : ''; ?></td>
            <td>
                <?php if (!empty($sp) && !empty($manager['sp'])) : ?>
                    <?php foreach ($sp as $key => $value) : ?>
                        <?php if (in_array($key, $manager['sp'])) : ?>
                            <?php echo $value . ','; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </td>
            <td>
                <?php if($manager['status'] == Manager::MAN_STATUS_NORMAL) { ?>
                    <span>正常</span>
                <?php  } else { ?>
                    <span class="f_red">禁用</span>
                <?php } ?>
            </td>
            <td>
                <a href="/admin/manager/edit/id/<?php echo $manager['id']; ?>">更新</a>
                <?php if($manager['status'] == Manager::MAN_STATUS_NORMAL) { ?>
                    <a href="/admin/manager/disable/id/<?php echo $manager['id']; ?>">禁用</a>
                <?php  } else { ?>
                    <a href="/admin/manager/enable/id/<?php echo $manager['id']; ?>">启用</a>
                <?php } ?>
                <a href="/admin/manager/delete/id/<?php echo $manager['id']; ?>">删除</a>
            </td>
        </tr>
     <?php } ?>
    <?php } ?>
</table>
