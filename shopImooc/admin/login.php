<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
    <link rel="stylesheet" type="text/css" href="../scripts/admin/login.css">
</head>
<body>
<div class="g-wrap">
    <div class="top">
        <div class="logoframe">
            <div class="u-icon">

            </div>
            <div class="u-loginicon">
                <p>欢迎登陆</p>

            </div>
        </div>

    </div>

    <div class="g-content">
        <div class="loginframe">
            <form action="doLogin.php" method="post">
                <ul class="login">
                    <li class="l-title">管理员账号</li>
                    <li class="l-input"><input type="text" name="username" placeholder="请输入管理员账号" class="login-input user_icon"></li>
                    <li class="l-title">密码</li>
                    <li class="l-input"><input type="password" name="password" placeholder="请输入密码" class="login-input"> </li>
                    <li class="l-title">验证码</li>
                    <li class="l-input"><input type="text" name="verify" placeholder="请输入验证码" class="login-input" autocomplete="off"></li>
                    <li><img src="getVerify.php"></li>
                    <li l-title><input type="checkbox" id="a1" checked="checked" name="autoFlag" value="1"><label for="a1">自动登陆（一周内自动登录）</label></li>
                    <li><input type="submit" value="" class="login_btn"></li>
                </ul>

            </form>

        </div>

    </div>
<div class="g-bottom">
    <p><a href="#">慕课简介</a><i>|</i><a href="#">慕课公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
    <p>Copyright &copy; 2006 - 2014 慕课版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
     <div class="imgs"> <div class="img1"></div> <div class="img1"></div> <div class="img1"></div> <div class="img1"></div></div>
</div>
</div>

</body>
</html>