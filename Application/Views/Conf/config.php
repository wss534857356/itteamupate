<?php
return array(
    //'配置项'=>'配置值'
    'DEFAULT_THEME' => 'default',
    'TMPL_DETECT_THEME' => true,
    'THEME_LIST' => 'default,newtheme',
    'DB_CHARSET'            => 'utf-8',      // 数据库编码默认采用utf8
    'DEFAULT_CHARSET'       => 'utf-8', // 默认输出编码
    'DEFAULT_LANG'          => 'zh-cn', // 默认语言
//    'TMPL_L_DELIM' => '{{',
//    'TMPL_R_DELIM' => '}}'
    'TMPL_PARSE_STRING'=>array(
        '__AVATAR__'=>'/thinkphp_3.2.3_core/Uploads/avatar'
    ),
    'TEMPLATE_CHARSET'	=>'utf-8', // 模板模板编码
    'OUTPUT_CHARSET'	=>'utf-8'// 默认输出编码
);