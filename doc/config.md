2013.07.26 mod config by lizf
    Config::model()->get() 现在支持设置默认值, 设置第三个参数为所需默认值
    string $key     标识,键名
    string $section 分组,默认为系统(数据值为system)
    string $default 默认值, 默认为null)
    如果有值则返回设置的值,如果没有设置统一返回设置的默认值
    Config::model()->get('icp'));
    Config::model()->get('icp', 'system'));
    Config::model()->get('icp', 'system', '京ICP证030173号'));

2013.07.24 add config by lizf
系统配置
    1.set方法
    string $key     标识,键名
    string $value   值
    string $section 分组,默认为系统(数据值为system)
    string $comment 配置说明
    返回值为true/false
    Config::model()->set('icp', '京ICP证030173号', 'system', '备案号');
    Config::model()->set('title', '帮帮浏览器', 'system', '网站名称');

    2.get方法
    string $key     标识,键名
    string $section 分组,默认为系统(数据值为system)
    如果有值则返回设置的值,如果没有设置统一返回NULL
    Config::model()->get('icp'));

    3.分组获取方法
    string $section 分组,默认为系统(数据值为system)
    返回数据为key=>value数组
    Config::model()->mget('search'));

    4.删除配置项方法
    string $key     标识,键名
    string $section 分组,默认为系统(数据值为system)
    返回true/false
    Config::model()->del('test', 'system');



