<?php
class UeditorWidget extends CWidget{


    private $_assetUrl;

    public $jsFiles=array(
        '/ueditor.config.js',
        '/ueditor.all.min.js',
    );
    public $cssFiles=array(
        '/themes/default/css/ueditor.css'
    );

    public $config = array(
                    'toolbars'=>array(array('anchor', //锚点
                    'undo', //撤销
                    'redo', //重做
                    'bold', //加粗
                    'indent', //首行缩进
                    'snapscreen', //截图
                    'italic', //斜体
                    'underline', //下划线
                    'strikethrough', //删除线
                    'subscript', //下标
                    'fontborder', //字符边框
                    'superscript', //上标
                    'formatmatch', //格式刷
                    'source', //源代码
                    'blockquote', //引用
                    'pasteplain', //纯文本粘贴模式
                    'selectall', //全选
                    'print', //打印
                    'preview', //预览
                    'horizontal', //分隔线
                    'removeformat', //清除格式
                    'time', //时间
                    'date', //日期
                    'unlink', //取消链接
                    'insertrow', //前插入行
                    'insertcol', //前插入列
                    'mergeright', //右合并单元格
                    'mergedown', //下合并单元格
                    'deleterow', //删除行
                    'deletecol', //删除列
                    'splittorows', //拆分成行
                    'splittocols', //拆分成列
                    'splittocells', //完全拆分单元格
                    'deletecaption', //删除表格标题
                    'inserttitle', //插入标题
                    'mergecells', //合并多个单元格
                    'deletetable', //删除表格
                    'cleardoc', //清空文档
                    'insertparagraphbeforetable', //"表格前插入行"
                    'insertcode', //代码语言
                    'fontfamily', //字体
                    'fontsize', //字号
                    'paragraph', //段落格式
                    'simpleupload', //单图上传
                    'insertimage', //多图上传
                    'edittable', //表格属性
                    'edittd', //单元格属性
                    'link', //超链接
                    'emotion', //表情
                    'spechars', //特殊字符
                    'searchreplace', //查询替换
                    'map', //Baidu地图
                    'gmap', //Google地图
                    'insertvideo', //视频
                    'help', //帮助
                    'justifyleft', //居左对齐
                    'justifyright', //居右对齐
                    'justifycenter', //居中对齐
                    'justifyjustify', //两端对齐
                    'forecolor', //字体颜色
                    'backcolor', //背景色
                    'insertorderedlist', //有序列表
                    'insertunorderedlist', //无序列表
                    'fullscreen', //全屏
                    'directionalityltr', //从左向右输入
                    'directionalityrtl', //从右向左输入
                    'rowspacingtop', //段前距
                    'rowspacingbottom', //段后距
                    'pagebreak', //分页
                    'insertframe', //插入Iframe
                    'imagenone', //默认
                    'imageleft', //左浮动
                    'imageright', //右浮动
                    'attachment', //附件
                    'imagecenter', //居中
                    'wordimage', //图片转存
                    'lineheight', //行间距
                    'edittip ', //编辑提示
                    'customstyle', //自定义标题
                    'autotypeset', //自动排版
                    'webapp', //百度应用
                    'touppercase', //字母大写
                    'tolowercase', //字母小写
                    'background', //背景
                    'template', //模板
                    'scrawl', //涂鸦
                    'music', //音乐
                    'inserttable', //插入表格
                    'drafts', // 从草稿箱加载
                    'charts', // 图表
            )),//toolbars注意是嵌套两个数组
                    'lang'=>'zh-cn'
                );
    //容器的ID 具有唯一性
    public $id;
    //后台接收name名称
    public $name;
    //初始化内容
    public $content='';
    //容器宽
    public $width='100%';
    //容器高
    public $height='400px';
    /**
     * 配置选项
     * 将ueditor.config.js的选项以数组键值的方式配置
     * @var array
     */
    // public $config=array();
    //后台统一url
    public $serverUrl;

    function init(){

        parent::init();

        if(trim($this->id)==''||trim($this->name)==''){
            throw new CException('必须设置容器id和name值');
        }

        //发布资源

        $this->_assetUrl=Yii::app()->assetManager->publish(Yii::getPathOfAlias('ext.baiduUeditor.resource'));

        $clientScript=Yii::app()->clientScript;
        //注册常量
        $jsConstant='window.UEDITOR_HOME_URL = "'.$this->_assetUrl.'/"';
        $clientScript->registerScript('ueditor_constant',$jsConstant,CClientScript::POS_BEGIN);

        //注册js文件

        foreach($this->jsFiles as $jsFile){
            $clientScript->registerScriptFile($this->_assetUrl.$jsFile,CClientScript::POS_END);

        }
        //注册css文件
        foreach($this->cssFiles as $cssFile){
            $clientScript->registerCssFile($this->_assetUrl.$cssFile);
        }
        //判断是否存在module
        if($this->owner->module!=null){
            $moduleId=$this->owner->module->id;
            $this->serverUrl=Yii::app()->createUrl($moduleId.'/ueditor');
        }else{
            $this->serverUrl=Yii::app()->createUrl('ueditor');
        }
        //config
        $this->config['serverUrl']=$this->serverUrl;

        $this->render('ueditor');


    }


}