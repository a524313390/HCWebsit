<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>会员登录<?php echo get_seo_suffix();?></title>
    <meta name="author" content="YzmCMS内容管理系统/QQ:214243830">
    <meta name="description" content="yzmcms会员登录" />
    <link href="<?php echo STATIC_URL;?>css/yzm-member-login.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL;?>plugin/layer/layer.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL;?>js/yzm-member.js"></script>
</head>

<body>
    <div class="yzm-member-container yzm-login">
        <div class="yzm-title">会员登录</div>
        <div class="yzm-form">
            <form action="" method="post" onsubmit="return do_login(this, '<?php echo U('member/index/login');?>')">
                <input type="hidden" name="referer" value="<?php echo $referer;?>">
                <ul>
                    <li><input type="text" class="input" name="username" id="username" placeholder="用户名或邮箱" value=""></li>
                    <li><input type="password" class="input" name="password" id="password" placeholder="请输入密码" value=""></li>
                    <?php if(get_config('member_yzm')) { ?>
                    <li><input type="text" class="input code" name="code" placeholder="请输入验证码"><img src="<?php echo U('api/index/code');?>" onclick="this.src=this.src+'?'" id="codeimg" class="codeimg" title="看不清，换一张"></li>
                    <?php } ?>
                    <li class="last_li"><input type="submit" class="submit" name="dosubmit" value="登 录"></li>
                </ul>
                <div class="yzmcms_other_login">
                    <a href="<?php echo U('member/other/qq_login');?>" target="_blank" class="qq" title="QQ登录"><img src="<?php echo STATIC_URL;?>images/yzm_qq_login.png"></a>
                    <a href="<?php echo U('member/other/weibo_login');?>" target="_blank" class="weibo" title="微博登录"><img src="<?php echo STATIC_URL;?>images/yzm_weibo_login.png"></a>
                </div>
                <div class="yzmcms_bottom">没有账号？<a href="<?php echo U('register');?>">立即注册</a>&nbsp;&nbsp;&nbsp; <a href="<?php echo U('member/reset/init');?>" target="_blank" style="color:#959595;float:right">忘记密码？</a></div>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="yzm_footer">
        <div class="container">
            <p>Powered by <a href="http://www.yzmcms.com" target="_blank"><?php echo YZMCMS_SOFTNAME;?></a> © 2014-2022 版权所有</p>
        </div>
    </div>
</body>

</html>