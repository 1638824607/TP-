<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title><?php echo ($title); ?></title>
        <meta name="keywords" content="<?php echo ($keywords); ?>" /> 
        <meta name="description" content="<?php echo ($description); ?>" /> 
        <link rel="shortcut icon" href="/jquery/2/288/demo/Public/images/favicon.ico" type="image/x-icon" /> 
        <link rel="stylesheet" href="/jquery/2/288/demo/Public/css/style<?php echo ($version); ?>.css" type="text/css" /> 
    </head> 
    <body> 
        <div id="site_nav">
            <div  class="sn_container clearfix">
                <ul class="tg_tools fr">
                    <li class='box_color nav_home'>
                        <span><a href="<?php echo U('Member/info');?>">个人中心</a></span><b class="icon"></b>
                        <ul>
                            <li><a href="<?php echo U('Member/info');?>"><span>我的主页</span></a></li>
                            <li><a href="<?php echo U('Member/set');?>"><span>个人设置</span></a></li>
                            <li><a href="<?php echo U('Member/downloads');?>"><span>下载记录</span></a></li>
                            <!--                            <li><a href="<?php echo U('Member/templates');?>"><span>我的模板</span></a></li>-->
                            <li><a href="<?php echo U('Member/sign');?>"><span>我的签到</span></a></li>
                            <li><a href="/jquery/2/288/demo/Index/logout?r=<?php echo ($url_cur); ?>"><span>退出登录</span></a></li>
                        </ul>
                    </li>
                    <li class="tg-line icon"></li>
                    <li class='box_color'>
                        <span>帮助中心</span><b class="icon"></b>
                        <ul>
                            <li><a href="/jquery/2/288/demo/help/template"><span>扒模板</span></a></li>
                            <li><a href="/jquery/2/288/demo/help/points"><span>积分获取</span></a></li>
                            <li><a href="/jquery/2/288/demo/help/contact"><span>联系我们</span></a></li>
                            <li><a href="/jquery/2/288/demo/help/index"><span>关于我们</span></a></li>
                            <li><a href="/jquery/2/288/demo/help/job"><span>招纳贤士</span></a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="tg_tools fl" >
                    <li class="tg_tools_home no-hover"><i class="icon-more"></i><span><a href="/jquery/2/288/demo">二当家的首页</a></span></li>

                    <?php if($_SESSION['userid']> 0): ?><li class="no-hover haslogin"><span><a href="<?php echo U('Member/info');?>"><font class="sn_login username"><?php echo (session('username')); ?></font></a></span></li>
                        <li class="tg-line icon"></li>
                        <li class="no-hover haslogin"><span><a href="/jquery/2/288/demo/Index/logout?r=<?php echo ($url_cur); ?>">退出</a></span></li>
                        <?php else: ?>
                        <li class="no-hover nologin"><span><a href="/jquery/2/288/demo/Index/login/type/qq.html"><img alt="Connect_logo_6.png" src="http://qzonestyle.gtimg.cn/qzone/vas/opensns/res/img/Connect_logo_6.png" style="position: relative;top:3px;"/></a></span></li>
                        <li class="no-hover hide haslogin"><span><a href="<?php echo U('Member/info');?>"><font class="sn_login username" id='head_username'></font></a></span></li>

                        <li class="tg-line icon"></li>
                        <li class="no-hover nologin"><span><a href="/jquery/2/288/demo/reg.html">注册</a></span></li>
                        <li class='box_color nav_home' id="nav_login">
                            <span><a href="/jquery/2/288/demo/login.html" class="sn_login">登录</a></span><b class="icon"></b>
                            <ul>
                                <li><a href="/jquery/2/288/demo/Index/login/type/qq.html"><span>腾讯QQ</span></a></li>
                                <li><a href="/jquery/2/288/demo/Index/login/type/sina.html"><span>新浪微博</span></a></li>
                                <li><a href="/jquery/2/288/demo/Index/login/type/renren.html"><span>人人网<i style="visibility: hidden">站</i></span></a></li>
                            </ul>
                        </li><?php endif; ?>


                </ul>

            </div>
        </div>
        <div id="header">
            <div class="tg_tools_home">
                <div class="bbs_enter">
                    <a class="bbs-banner"  href="/jquery/2/288/demo/help/template" target="_blank"><img src="/jquery/2/288/demo/Public/images/other/banner.jpg" alt="扒模板"/></a>
                </div>
                <div class="logo">
                    <a class="logo-bd"  href="/jquery/2/288/demo"><img src="/jquery/2/288/demo/Public/images/logo.png" alt="二当家的logo"/></a>
                </div>
                <form action="/jquery/2/288/demo/search.html" method="GET" name="form_search">
                    <div id='search'>
                        <div class="search_area">
                            <input type='submit' value='搜 索' class='btn_search' onclick="var keywords = $('#search_input').val();
                                    if (keywords == '请输入搜索内容' || keywords == '') {
                                        location.href = 'http://www.erdangjiade.com';
                                        return false;
                                    }"/>
                            <div class="search_select">
                                <span class="icon-search"></span>
                            </div>
                            <input type='text' value='<?php echo ((isset($keyword) && ($keyword !== ""))?($keyword):"请输入搜索内容"); ?>'  class="search_input" name="keyword" autocomplete="off" id="search_input" data-default="请输入搜索内容" onblur="checkInputBlur($(this))" onfocus="checkInputFocus($(this))" />
                        </div>
                        <div class="search_box hide" id="search_box"></div>
                        <div class='search_keywords' >
                            <span>热门搜索：</span>
                            <a href="/jquery/2/288/demo/templates/0-0-52-0-0">手机</a>
                            <a href="/jquery/2/288/demo/search/search.html?keyword=订餐">订餐</a>
                            <a href="/jquery/2/288/demo/search/search.html?keyword=bootstrap">bootstrap</a>
                            <a href="/jquery/2/288/demo/search/search.html?keyword=后台">后台</a>
                            <a href="/jquery/2/288/demo/search/search.html?keyword=上传">上传</a>
                            <a href="/jquery/2/288/demo/search/search.html?keyword=购物车">购物车</a>
                            <a href="/jquery/2/288/demo/search/search.html?keyword=瀑布流">瀑布流</a>
                            <a href="/jquery/2/288/demo/search/search.html?keyword=弹出层">弹出层</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id='nav' class='nav'>
            <div class='nav_main clearfix'>
                <a href='/jquery/2/288/demo' class="menu<?php echo (getequal($control,'index',' current')); ?>">首 页</a>
                <a href='/jquery/2/288/demo/js' class="menu<?php echo (getequal($control,'js',' current')); ?>">网页特效</a>
                <a href='/jquery/2/288/demo/php' class="menu<?php echo (getequal($control,'php',' current')); ?>">PHP</a>
                <a href='/jquery/2/288/demo/templates' class="menu<?php echo (getequal($control,'templates',' current')); ?>">网站模板</a>

                <span class='icon_hot'></span>
            </div>
        </div>
<div class="container">
    <div class="index_per index_first clearfix">
        <div class="sidebar_per sidebar_first">
            <dl>
                <dt>
                <a href="/jquery/2/288/demo/js/" class="more">更多&nbsp;<span class="more-sign">&gt;</span></a>
                <strong>最新更新 <span class="name-en">/New</span></strong>
                </dt>
                <?php if(is_array($index_latest)): foreach($index_latest as $key=>$row): ?><dd class="sidebar_articles">
                        <span><?php echo (date("m-d",$row["addtime"])); ?></span>
                        <a target="_blank"  href="/jquery/2/288/demo/<?php echo ($row["mtype"]); ?>/<?php echo ($row["id"]); ?>.html"><?php echo ($row["name"]); ?></a>
                    </dd><?php endforeach; endif; ?>
            </dl>
        </div>
        <div class="index_left clearfix">
            <div class="banner" id="banner">
                <ul id="index_banner">
                    <li>
                        <a target="_blank" href="/jquery/2/288/demo/templates/0-0-52-0-0">
                            <img alt="响应式模板" src="/jquery/2/288/demo/Public/images/other/mobile.jpg">
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="/jquery/2/288/demo/templates/22-0-0-0-0">
                            <img alt="商城,特卖模板" src="/jquery/2/288/demo/Public/images/other/mall.jpg">
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="/jquery/2/288/demo/templates/53-0-0-0-0">
                            <img alt="404模板" src="/jquery/2/288/demo/Public/images/other/404.jpg">
                        </a>
                    </li>
                </ul>
                <div class="banner_page" id="banner_page"></div>
                <a class="banner_page_btn banner_page_left" id="banner_page_left"></a>
                <a class="banner_page_btn banner_page_right" id="banner_page_right"></a>
            </div>
            <div class='merchant_cats'>
                <div class='head'><h3>网站快速导航</h3></div>
                <div class="content" id="merchant_cats_menus"> 
                    <a href="/jquery/2/288/demo/templates"><i class="merchant_arrow merchant_arrow_right"></i><span class="icon_merchant icon_merchant_fire"></span><span class="name">网站模板</span><i class="merchant_arrow_left"></i> </a> 
                    <a href="/jquery/2/288/demo/templates/0-0-52-0-0"><i class="merchant_arrow merchant_arrow_right"></i><span class="icon_merchant icon_merchant_mobile"></span><span class="name">手机模板</span><i class="merchant_arrow_left"></i></a>
                    <a href="/jquery/2/288/demo/js"><i class="merchant_arrow merchant_arrow_right"></i><span class="icon_merchant icon_merchant_js"></span><span class="name">网页特效</span><i class="merchant_arrow_left"></i></a>
                    <a href="/jquery/2/288/demo/php"><i class="merchant_arrow merchant_arrow_right"></i><span class="icon_merchant icon_merchant_png"></span><span class="name">PHP</span><i class="merchant_arrow_left"></i></a>
                    <a href="/jquery/2/288/demo/site"><i class="merchant_arrow merchant_arrow_right"></i><span class="icon_merchant icon_merchant_typeface"></span><span class="name">精品网址</span><i class="merchant_arrow_left"></i></a>
                    <a href="/jquery/2/288/demo/php/124-0-0-0"><i class="merchant_arrow merchant_arrow_right"></i><span class="icon_merchant icon_merchant_code"></span><span class="name">Ajax</span><i class="merchant_arrow_left"></i></a>
                </div> 
            </div>
        </div>
    </div>
    <div class="index_per clearfix">
        <div class="sidebar_per sidebar_second">
            <dl>
                <dt>
                <a href="/jquery/2/288/demo/templates/0-0-0-6-0" class="more" target="_blank">更多&nbsp;<span class="more-sign">&gt;</span></a>
                <strong>推荐模板 <span class="name-en">/Template</span></strong>
                </dt>
                <?php if(is_array($templates_recommend)): foreach($templates_recommend as $key=>$row): ?><dd class="sidebar_articles">
                        <span><?php echo (date("m-d",$row["addtime"])); ?></span>
                        <a target="_blank"  href="/jquery/2/288/demo/templates/<?php echo ($row["id"]); ?>.html"><?php echo ($row["name"]); ?></a>
                    </dd><?php endforeach; endif; ?>
            </dl>
            <!--            <div class="apply"><a href="/jquery/2/288/demo/help/template" target="_blank" class="btn">申请扒模板</a></div>-->
        </div>
        <div class="index_recommend" id='index_recommend_0'>
            <div class="head clearfix">
                <strong>网站模板</strong>
                <a class="more" href="/jquery/2/288/demo/templates" target="_blank">更多&nbsp;<span class="more-sign">></span></a>
                <ul class="clearfix index-coupon-menus">
                    <li class="current index-coupon-menus-first">
                        全部
                        <span class="arrow-up-menu arrow"></span>
                    </li>
                    <?php if(is_array($modals_cat)): foreach($modals_cat as $key=>$row): ?><li>
                            <?php echo ($row["name"]); ?>
                            <span class="arrow-up-menu arrow"></span>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="content clearfix">
                <div class="per current">
                    <ul class="ul_pics">
                        <?php if(is_array($templates_latest_pics)): foreach($templates_latest_pics as $key=>$row): ?><li><a target="_blank"  href="/jquery/2/288/demo/templates/<?php echo ($row["id"]); ?>.html">
                                    <img src="/jquery/2/288/demo/Public/images/grey.gif" original="<?php echo (getmodalslogo($row["id"],'small')); ?>" alt="<?php echo ($row["name"]); ?>" class="lazy"  />
                                    <?php echo ($row["name"]); ?>
                                </a></li><?php endforeach; endif; ?>
                    </ul>
                    <ul class="ul_words">
                        <?php if(is_array($templates_latest_words)): foreach($templates_latest_words as $key=>$row): ?><li><a target="_blank"  href="/jquery/2/288/demo/templates/<?php echo ($row["id"]); ?>.html"><?php echo ($row["name"]); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </div>
                <?php if(is_array($modals_cat)): foreach($modals_cat as $key=>$row): ?><div class="per">
                        <ul class="ul_pics">
                            <?php if(is_array($row['sub_recommend'])): foreach($row['sub_recommend'] as $key2=>$row2): ?><li><a target="_blank"  href="/jquery/2/288/demo/templates/<?php echo ($row2["id"]); ?>.html">
                                        <img src="/jquery/2/288/demo/Public/images/grey.gif" original="<?php echo (getmodalslogo($row2["id"],'small')); ?>" alt="<?php echo ($row2["name"]); ?>" class="lazy"  />
                                        <?php echo ($row2["name"]); ?>
                                    </a></li><?php endforeach; endif; ?>
                        </ul>
                        <ul class="ul_words">
                            <?php if(is_array($row['sub_latest'])): foreach($row['sub_latest'] as $key2=>$row2): ?><li><a target="_blank"  href="/jquery/2/288/demo/templates/<?php echo ($row2["id"]); ?>.html"><?php echo ($row2["name"]); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div><?php endforeach; endif; ?>
            </div>
        </div>
        <div class="sidebar_per sidebar_second">
            <dl>
                <dt>
                <a href="/jquery/2/288/demo/js/0-0-6-0" class="more" target="_blank">更多&nbsp;<span class="more-sign">&gt;</span></a>
                <strong>推荐特效 <span class="name-en">jQuery</span></strong>
                </dt>
                <?php if(is_array($js_recommend)): foreach($js_recommend as $key=>$row): ?><dd class="sidebar_articles">
                        <span><?php echo (date("m-d",$row["addtime"])); ?></span>
                        <a target="_blank"  href="/jquery/2/288/demo/js/<?php echo ($row["id"]); ?>.html"><?php echo ($row["name"]); ?></a>
                    </dd><?php endforeach; endif; ?>
            </dl>
        </div>
        <div class="index_recommend" id='index_recommend_1'>
            <div class="head clearfix">
                <strong>网页特效</strong>
                <a class="more" href="/jquery/2/288/demo/js" target="_blank">更多&nbsp;<span class="more-sign">></span></a>
                <ul class="index-coupon-menus clearfix">
                    <li class="current index-coupon-menus-first">
                        全部
                        <span class="arrow-up-menu arrow"></span>
                    </li>
                    <?php if(is_array($js_cat)): foreach($js_cat as $key=>$row): if($key < 6): ?><li>
                            <?php echo ($row["name"]); ?>
                            <span class="arrow-up-menu arrow"></span>
                        </li><?php endif; endforeach; endif; ?>
                </ul>
            </div>
            <div class="content clearfix">
                <div class="per current">
                    <ul class="ul_pics">
                        <?php if(is_array($js_latest_pics)): foreach($js_latest_pics as $key=>$row): ?><li><a target="_blank"  href="/jquery/2/288/demo/js/<?php echo ($row["id"]); ?>.html">
                                    <img src="/jquery/2/288/demo/Public/images/grey.gif" original="<?php echo (getmodalslogo($row["id"],'small','js')); ?>" alt="<?php echo ($row["name"]); ?>" class="lazy"  />
                                    <?php echo ($row["name"]); ?>
                                </a></li><?php endforeach; endif; ?>
                    </ul>
                    <ul class="ul_words">
                        <?php if(is_array($js_latest_words)): foreach($js_latest_words as $key=>$row): ?><li><a target="_blank"  href="/jquery/2/288/demo/js/<?php echo ($row["id"]); ?>.html"><?php echo ($row["name"]); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </div>
                <?php if(is_array($js_cat)): foreach($js_cat as $key=>$row): ?><div class="per">
                        <ul class="ul_pics">
                            <?php if(is_array($row['sub_recommend'])): foreach($row['sub_recommend'] as $key2=>$row2): ?><li><a target="_blank"  href="/jquery/2/288/demo/js/<?php echo ($row2["id"]); ?>.html">
                                        <img src="/jquery/2/288/demo/Public/images/grey.gif" original="<?php echo (getmodalslogo($row2["id"],'small','js')); ?>" alt="<?php echo ($row2["name"]); ?>" class="lazy"  />
                                        <?php echo ($row2["name"]); ?>
                                    </a></li><?php endforeach; endif; ?>
                        </ul>
                        <ul class="ul_words">
                            <?php if(is_array($row['sub_latest'])): foreach($row['sub_latest'] as $key2=>$row2): ?><li><a target="_blank"  href="/jquery/2/288/demo/js/<?php echo ($row2["id"]); ?>.html"><?php echo ($row2["name"]); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div><?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="footer" id="footer" data-url="/jquery/2/288/demo/" data-logout="/jquery/2/288/demo/Download/logout?r=<?php echo ($url_cur); ?>" data-id="<?php echo ($id); ?>" data-mtype="<?php echo ($mtype); ?>"> 
    <div class="footer_main clearfix">
        <div class="guide">
            <span class="guide_icon"></span>
            <ul class="ul_foot">
                <li><strong>网站模板</strong></li>
                <li><a href="/jquery/2/288/demo/templates/3-0-0-0-0">行业模板</a><a href="/jquery/2/288/demo/templates/7-0-0-0-0">专题模板</a></li>
                <li><a href="/jquery/2/288/demo/templates/4-0-0-0-0">商城模板</a><a href="/jquery/2/288/demo/templates/8-0-0-0-0">后台模板</a></li>
                <li><a href="/jquery/2/288/demo/templates/5-0-0-0-0">企业模板</a><a href="/jquery/2/288/demo/templates/9-0-0-0-0">其他模板</a></li>
                <li><a href="/jquery/2/288/demo/templates/69-0-0-0-0">个人博客</a><a href="/jquery/2/288/demo/templates/54-0-0-0-0">服装模板</a></li>
            </ul>
        </div>
        <div class="stores">
            <span class="stores_icon"></span>
            <ul class="ul_foot">
                <li><strong>网页特效</strong></li>
                <li><a href="/jquery/2/288/demo/js/7-0-0-0">图片代码</a><a href="/jquery/2/288/demo/js/7-0-0-0">悬浮层/弹出层</a></li>
                <li><a href="/jquery/2/288/demo/js/8-0-0-0">导航菜单</a><a href="/jquery/2/288/demo/js/14-0-0-0">其它特效</a></li>
                <li><a href="/jquery/2/288/demo/js/9-0-0-0">选项卡/滑动门</a><a href="/jquery/2/288/demo/js/53-0-0-0">PHP+Ajax</a></li>
                <li><a href="/jquery/2/288/demo/js/11-0-0-0">表单代码</a><a href="/jquery/2/288/demo/js/128-0-0-0">jQuery插件</a></li>
            </ul>
        </div>
        <div class="rebate">
            <span class="rebate_icon"></span>
            <ul class="ul_foot">
                <li><strong>精选网址</strong></li>
                <li><a href="/jquery/2/288/demo/site/3-0-0-0-0">行业网址</a><a href="/jquery/2/288/demo/site/22-0-0-0-0">订餐外送</a></li>
                <li><a href="/jquery/2/288/demo/site/4-0-0-0-0">商城网址</a><a href="/jquery/2/288/demo/site/23-0-0-0-0">旅游酒店</a></li>
                <li><a href="/jquery/2/288/demo/site/5-0-0-0-0">企业网址</a><a href="/jquery/2/288/demo/site/24-0-0-0-0">网络设计</a></li>
                <li><a href="/jquery/2/288/demo/site/9-0-0-0-0">其他网址</a><a href="/jquery/2/288/demo/site/77-0-0-0-0">资源分享</a></li>
            </ul>
        </div>

        <div class="follow">
            <span class="follow_icon"></span>
            <ul>
                <li>
                    <strong>联系我们</strong>
                </li>
                <li>
                    <a  class="qq-chat" href="//wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzgwMDA2NjkzMF83MjI3OF84MDAwNjY5MzBfMl8" target="_blank">
                        <img alt="QQ在线客服" src="/jquery/2/288/demo/Public/images/qq-chat.png">
                    </a>
                </li>
                <li>qq群：35291327</li>
                <li>邮箱：674081005@qq.com</li>
            </ul>
        </div>
        <div class="friendly">
            <?php if(!empty($friends)): ?><div class="link_exchange">
                    <strong>友情链接：</strong>
                    <?php if(is_array($friends)): foreach($friends as $key=>$row): ?><a target="_blank" href="<?php echo ($row["url"]); ?>"><?php echo ($row["name"]); ?></a><?php endforeach; endif; ?>
                </div><?php endif; ?>
            <div class="foot_menu">
                <a href="/jquery/2/288/demo/help/template" target="_blank">扒模板</a>
                <a href="/jquery/2/288/demo/help/contact" target="_blank">联系我们</a>
                <a href="/jquery/2/288/demo/help/index" target="_blank">关于我们</a>
                <a href="/jquery/2/288/demo/help/job" target="_blank">招纳贤士</a>
                <a href="/jquery/2/288/demo/sitemap.html" target="_blank">网站地图</a>
                <span class="address">Copyright&copy;2010-2015 All Rights Reserved. 苏ICP备15009298</span>
            </div>
        </div>
    </div>
</div>

<div id="windown_box" class="modal fade">
    <div class="pop_title">
        <div class="pop_name">登录</div>
        <i class="pop_close" onclick="$('#windown_box').modal('hide')"></i>
    </div>
    <div class="pop_content">
        <div class="form_item">
            <div class="item_tip">用户名/邮箱</div>
            <input id="email" name="email"  class="form_input" type="text" autocomplete="off" tabindex="1" value="" onblur="blurInputLoginBox($(this))"  onfocus ="focusInputLoginBox($(this))"/>
        </div>
        <div class="form_item">
            <div class="item_tip">密码</div>
            <input name="pwd" id="pwd"class="form_input" type="password" tabindex="2" value="" onblur="blurInputLoginBox($(this))"  onfocus ="focusInputLoginBox($(this))" />
        </div>
        <div class="captchaBox">
            <div class="two_weeks">
                <input id="rememberme" class="ckeckBox" type="checkbox" name="rememberme">
                <label for="rememberme">两周内免登录</label>
                <a  href="/jquery/2/288/demo/reg.html" target="_blank" class="loginbox_reg">免费注册</a>
            </div>
        </div>
        <p class="notice_error"></p>
        <input id="btn_login" class="btn" type="button" onclick="sublogin()" tabindex="4" value="登  录">
        <a class="a_underline" href="/jquery/2/288/demo/forget.html">忘记密码？</a>
        <div class="co_login" style="margin:20px 0 0">
                联合登录
                <a class="a_underline" href="/jquery/2/288/demo/Index/login/type/qq.html">腾讯QQ</a>
                <a class="a_underline" href="/jquery/2/288/demo/Index/login/type/sina.html">新浪微博</a>
                <a class="a_underline" href="/jquery/2/288/demo/Index/login/type/renren.html">人人网</a>
                绑定送<span class="red">200</span>积分
            </div>
    </div>
</div>
<?php if($control == 'js' && $mod == 'detail'): ?><script src="/jquery/2/288/demo/Public/js/other/jquery_highlight.js" type="text/javascript"></script>
    <?php else: ?>
    <script src="/jquery/2/288/demo/Public/js/jquery.js" type="text/javascript"></script><?php endif; ?>
<script src="/jquery/2/288/demo/Public/js/common<?php echo ($version); ?>.js" type="text/javascript"></script>
<?php if($control == 'index' && $mod == 'index'): ?><script src="/jquery/2/288/demo/Public/js/other/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script><?php endif; ?>

<?php if(($control == 'js' or $control == 'php') && $mod == 'detail'): ?><!--[if !IE]><!-->
    <script src="/jquery/2/288/demo/Public/js/other/jquery.chili-2.2.js" type="text/javascript"></script>
    <script src="/jquery/2/288/demo/Public/js/other/recipes.js" type="text/javascript"></script>
    <!--<![endif]--><?php endif; ?>
<div class="mmsg-box mmsg-box-info" id='msg-box' style="margin-top: -23.5px; margin-left: -96.5px;">
    <div class="mmsg-content">
        <i class="mmsg-icon"></i>
        <p id='msg-box-content'></p>
    </div>
    <div class="mmsg-background"></div>
</div>
<script  type="text/javascript">
var _hmt=_hmt||[];(function(){var hm=document.createElement("script");hm.src="//hm.baidu.com/hm.js?5f5a95758129ff157ca4d0d7afabff18";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(hm,s)})();
</script>
</body>
</html>