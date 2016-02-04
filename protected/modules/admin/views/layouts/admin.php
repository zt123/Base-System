<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->getPageTitle(); ?></title>
    <script type="text/javascript" src="/statics/plugins/jquery-1.8.2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/statics/plugins/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="/statics/plugins/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/statics/plugins/bootstrap/css/bootstrap-responsive.min.css">

    <link rel="stylesheet" type="text/css" href="/statics/css/admin.css">
    <script type="text/javascript" src="/statics/plugins/jquery.validate.js"></script>
</head>

<body data-spy="scroll" data-target=".subnav" data-offset="50">
    <?php $this->widget('application.modules.admin.widgets.NavBarWidget'); ?>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <?php $this->widget('application.modules.admin.widgets.NavListWidget'); ?>
        </div> 
        <div class="span10">
            <?php $this->widget('application.modules.admin.widgets.AlterMsgWidget'); ?>
            <?php echo $content; ?>
        </div> 
      </div> 

      
    </div>
    <footer>
      <p >© 网信天成科技有限公司 2014</p>
    </footer>
    <?php $this->widget('application.modules.admin.widgets.ShowImageWidget'); ?>
</body>
<script>
    function showSuccess(msg)
    {
        alert(msg);
    }
    function showFail(msg)
    {
        alert(msg);
    }
    function showMessage(msg,type)
    {
        if(type)
            showSuccess(msg)
        else
            showFail(msg)
    }
    function showAfterMsg(that, msg, type)
    {
      if (type) {
          $(that).parent().parent().removeClass('error');
          $(that).next('.help-inline').remove();
      } else {
        $(that).parent().parent().addClass('error');
        if (!$(that).siblings().hasClass('help-inline')) {
            $(that).after('<span class="help-inline">' + msg + '</span>');
        }
      }
    }
</script>
 
</html>
