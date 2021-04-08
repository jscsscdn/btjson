<?php
//缓存开关(建议开启)
$cacheSwitch = false;
//缓存时间(单位秒)[默认缓存600秒]
$cacheTime = 600;
//缓存清理秘钥,请通过播放器入口输入?type=clear&key=你的安全秘钥 清理
$cacheClearToken = "123456";
//缓存清理时间(单位秒)[清理300秒以前的缓存数据]
$cacheClearTime = 300;

//在线统计开关
$allStatistics = true;//统计总在线人数,设置成false为单条地址在线人数

//URL支持,列如?url=7a6d6103-2fb7-4f61-9461-6544d4c87452-qqwy 微云ID
//需要在下方写入支持匹配,否则无法播放
$urlSupport = [
    "-yywy",
    "-qqwy",
    "-yh",
    "1097_",
    "1006_",
    "1075_",
    "1098_",
    "-mao"
];

//支持Dp原生解析的url,将不会通过解析口进入
//match 匹配字符串数据
//referrer协议,空默认Origin
//可选 Origin,never,no-referrer
$dpPlayerNative = [
    [
        "match" => ".m3u8",
        "referrer" => "Origin"
    ], [
        "match" => ".mp4",
        "referrer" => "Origin"
    ], [
        "match" => ".flv",
        "referrer" => "Origin"
    ], [
        "match" => "pan.cuan.la",
        "referrer" => "Origin"
    ], [
        "match" => "pan.metct.com",
        "referrer" => "Origin"
    ], [
        "match" => "api.qianqi.net",
        "referrer" => "Origin"
    ], [
        "match" => "jx.dd0820.com",
        "referrer" => "Origin"
    ], [
        "match" => "quan.qq.com",
        "referrer" => "Origin"
    ], [
        "match" => "qq.com-ok-qq.com",
        "referrer" => "Origin"
    ], [
        "match" => "doc.shangzhibo.tv",
        "referrer" => "no-referrer"
    ], [
        "match" => "115.com",
        "referrer" => "no-referrer"
    ],[
        "match" => ".m3u",
        "referrer" => "Origin"
    ], [
        "match" => "www.oplaydrive.com",
        "referrer" => "Origin"
    ]
];

//检测部分无法使用Dp播放的地址转交给CK播放
//下方写匹配数据 url传入数据 列如
//https://www.miguvideo.com/mgs/website/prd/detail.html?cid=679919978
//将会使用ckPlayer进行播放
$ckPlayerMatch = [
    "fun.tv",
    "miguvideo.com",
    "tv.sohu.com",
    "film.sohu.com",
    
];

//请按照下方写法
//title = 解析标题
//match = 匹配值 * 通用 多个匹配以 “|”切割
//cache = ["switch"=>(true|开,false|关),"cacheTime"=>"300"] 缓存开关以及单独缓存时间
//player = 特殊解析口,列如地址中含有双?url=,以及需要使用到特殊referrer(true|开,false|关)
//referrer = 特殊功能,player必须为true,该功能需要在群内询问好处理
//url = 解析接口
//spare_url = 备用解析接口
//.m3u8 .mp4 .flv 以外匹的地址会读取该配置
$Parsing = [
    [
        "title" => "解析接口",
        "match" => "-yywy|-yh",//匹配值“|”多个拼接
        "url" => "自己的json解析接口"
    ],[
        "title" => "短视频解析接口",
        "match" => "*",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
       "player" => true,//特殊功能,列如想设置referrer需要启动
        "url" => "自己的json解析接口",//本接口支持：快手,抖音,微视,皮皮虾,皮皮搞笑,最右,火山,WIDE,IM短影,映客IN,小红书,小咖秀，陌陌,微博,秒拍,梨视频,美拍,YY神曲等视频解析
        "referrer" => [
            "default" => "no-referrer", //默认头禁止来源no-referrer
    ]
    ],[
        "title" => "咪咕解析接口",
        "match" => "miguvideo.com|tv.sohu.com|film.sohu.com",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
        "player" => true,//特殊功能,列如想设置referrer需要启动
        "url" => "自己的json解析接口",//主接口,依旧支持备用接口
        "referrer" => [
           "default" => "never", //默认头禁止来源no-referrer
            "no-referrer" => []
        ]
    ],[
        "title" => "乐视解析接口",
        "match" => "le.com",
        "cache" => [
            "switch" => false, //缓存开关
            "cacheTime" => 300 //缓存时间
        ],
        "url" => "自己的json解析接口", //主接口
        "spare_url" => "自己的json解析接口" //备用接口
    ],[
        "title" => "搜狐解析接口",
        "match" => "tv.sohu.com",
        "cache" => [
            "switch" => false, //缓存开关
            "cacheTime" => 300 //缓存时间
        ],
        "url" => "自己的json解析接口", //主接口
        "spare_url" => "自己的json解析接口" //备用接口
    ],[
        "title" => "PPTV解析接口",
        "match" => "pptv.com",
        "cache" => [
            "switch" => false, //缓存开关
            "cacheTime" => 300 //缓存时间
        ],
        "url" => "自己的json解析接口", //主接口
        "spare_url" => "自己的json解析接口" //备用接口
    ],[
        "title" => "M1905解析接口",
        "match" => "m1905.com",
        "cache" => [
            "switch" => false, //缓存开关
            "cacheTime" => 300 //缓存时间
        ],
        "url" => "自己的json解析接口", //主接口
        "spare_url" => "自己的json解析接口" //备用接口
    ],[
        "title" => "优酷解析接口",
        "match" => "youku.com",
        "cache" => [
            "switch" => false, //缓存开关
            "cacheTime" => 300 //缓存时间
        ],
        "url" => "自己的json解析接口", //主接口
       "spare_url" => "自己的json解析接口" //备用接口
    ],[
        "title" => "芒果解析接口",
        "match" => "mgtv.com",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
        "player" => true,//特殊功能,列如想设置referrer需要启动
        "url" => "自己的json解析接口",//主接口,依旧支持备用接口
        "referrer" => [
            "default" => "no-referrer", //默认头禁止来源no-referrer
                ]
    ],[
        "title" => "上直播解析接口",
        "match" => "doc.shangzhibo.tv",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
        "player" => true,//特殊功能,列如想设置referrer需要启动
        "url" => "自己的json解析接口",//主接口,依旧支持备用接口
        "referrer" => [
            "default" => "no-referrer", //默认头禁止来源no-referrer
                ]
    ],[
        "title" => "奇艺解析接口",
        "match" => "iqiyi.com",
        "cache" => [
            "switch" => false, //缓存开关
            "cacheTime" => 600 //缓存时间
        ],
        "url" => "自己的json解析接口", //主接口
        "spare_url" => "自己的json解析接口" //备用接口
   //  ],[
     //   "title" => "芒果解析接口",
     //   "match" => "mgtv.com",
      //  "cache" => [
    //        "switch" => true, //缓存开关
      //      "cacheTime" => 600 //缓存时间
    //    ],
      //  "url" => "自己的json解析接口", //主接口
      //  "spare_url" => "自己的json解析接口" //备用接口
    ],[
        "title" => "腾讯解析接口",
        "match" => "qq.com",
        "cache" => [
            "switch" => false, //缓存开关
            "cacheTime" => 300 //缓存时间
            ],
        "url" => "自己的json解析接口", //主接口
        "spare_url" => "自己的json解析接口" //备用接口
       
    ],[
        "title" => "1098解析接口",
            "match" => "1098_",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
           "player" => true,//特殊功能,列如想设置referrer需要启动
            "cache" => [
            "switch" => false, //缓存开关
            "cacheTime" => 300 //缓存时间
             ],
            "url" => "自己的json解析接口",//主接口,依旧支持备用接口
            "referrer" => [
                "default" => "no-referrer", //默认头禁止来源no-referrer
             ]
     ],[
        "title" => "1097解析接口",
            "match" => "1097_|1075_",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
           
           "player" => true,//特殊功能,列如想设置referrer需要启动
            "cache" => [
            "switch" => false, //缓存开关
            "cacheTime" => 600 //缓存时间
        ],
            "url" => "自己的json解析接口",//主接口,依旧支持备用接口
            "referrer" => [
                "default" => "no-referrer", //默认头禁止来源no-referrer
                ]  
    ],[
        "title" => "1006解析接口",
            "match" => "1006_",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
           
           "player" => false,//特殊功能,列如想设置referrer需要启动
            "cache" => [
            "switch" => false, //缓存开关
            "cacheTime" => 600 //缓存时间
        ],
            "url" => "自己的json解析接口",//主接口,依旧支持备用接口
            "referrer" => [
                "default" => "never", //默认头禁止来源no-referrer
                ]    
    ],[
            "title" => "百度云解析接口",
               "match" => "kssznuu.cn|dious.cc|wuyou-zuida.com|tianzhen-zuida.com",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
               "player" => true,//特殊功能,列如想设置referrer需要启动
                "url" => "https://www.cuan.la/json/share.php?url=",//主接口,依旧支持备用接口
                "referrer" => [
                    "default" => "no-referrer", //默认头禁止来源no-referrer
                ]

    ],[
            "title" => "不知名解析接口",
               "match" => "tudou.com-l-tudou.com",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
               "player" => true,//特殊功能,列如想设置referrer需要启动
                "url" => "https://www.cuan.la/json/share.php?url=",//主接口,依旧支持备用接口
                "referrer" => [
                    "default" => "no-referrer", //默认头禁止来源no-referrer
                ]
    ],[
            "title" => "不知名解析接口",
               "match" => "115.com",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
               "player" => true,//特殊功能,列如想设置referrer需要启动
                "url" => "",//主接口,依旧支持备用接口
                "referrer" => [
                    "default" => "no-referrer", //默认头禁止来源no-referrer
                ]
     ],[
            "title" => "不知名解析接口",
               "match" => "qq.com-ok-qq.com",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
               "player" => true,//特殊功能,列如想设置referrer需要启动
                "url" => "https://www.cuan.la/json/share.php?url=",//主接口,依旧支持备用接口
                "referrer" => [
                    "default" => "no-referrer", //默认头禁止来源no-referrer
                ]
    ],[
            "title" => "西瓜解析接口",
               "match" => "ixigua.com",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
               "player" => true,//特殊功能,列如想设置referrer需要启动
                "url" => "https://yu.cuan.la/btjson/?url=",//主接口,依旧支持备用接口
                "referrer" => [
                    "default" => "no-referrer", //默认头禁止来源no-referrer
                ]
    ],[
            "title" => "B站解析接口",
               "match" => "bilibili.com",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
               "player" => true,//特殊功能,列如想设置referrer需要启动
                "url" => "自己的json解析接口",//主接口,依旧支持备用接口
                "referrer" => [
                    "default" => "no-referrer", //默认头禁止来源no-referrer
                ]
     ],[
            "title" => "A站解析接口",
               "match" => "acfun.cn",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
               "player" => true,//特殊功能,列如想设置referrer需要启动
                "url" => "自己的json解析接口",//主接口,依旧支持备用接口
                "referrer" => [
                    "default" => "no-referrer", //默认头禁止来源no-referrer
                ]

    ],[
        
        "title" => "西瓜解析接口",
        "match" => "haokan.baidu.com",//全局匹配,如果单独匹配无法匹配出来 将会通过 * 值匹配的接口
        "player" => true,//特殊功能,列如想设置referrer需要启动
        "url" => "自己的json解析接口",//主接口,依旧支持备用接口
        "referrer" => [
           "default" => "never", //默认头禁止来源no-referrer
            "no-referrer" => [
                "1006"
            ]
        ]
    ]
];

return [
    "cacheSwitch" => $cacheSwitch,
    "cacheTime" => $cacheTime,
    "cacheClearToken" => $cacheClearToken,
    "cacheClearTime" => $cacheClearTime,
    "allStatistics" => $allStatistics,
    "urlSupport" => $urlSupport,
    "ckPlayerMatch" => $ckPlayerMatch,
    "dpPlayerNative" => $dpPlayerNative,
    "Parsing" => $Parsing
];