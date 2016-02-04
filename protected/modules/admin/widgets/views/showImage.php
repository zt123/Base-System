<script type="text/javascript" src="/statics/plugins/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/statics/plugins/fancybox/jquery.fancybox-1.3.4.css" media="screen" >
<div class="wx_siw_hidden">
    <a id="wx_siw_image" href="#"></a>
</div>
<style type="text/css">
    .wx_siw_hidden{
        display: hidden;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
    $("#wx_siw_image").fancybox({
        'padding':0
    });
    $(".wx_siw").click(function(){
        $("#wx_siw_image").attr('href', '').attr('href', $(this).attr('wx_siw_url')).click();
        return false;
    });
});
</script>
