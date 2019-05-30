<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- 窗口折叠 -->
        <span class="logo-mini">php后台</span>
        <!-- 窗口展开 -->
        <span class="logo-lg">php后台</span>
    </a>
    <!-- 右上导航 -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="/" target="_blank">网站首页</a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{tw_asset("vendor/tw/global/face/default.png")}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">yxx</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{tw_asset("vendor/tw/global/face/default.png")}}" class="img-circle" alt="User Image">
                            <p>
                                yxx
                                <small>管理员</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="" class="btn btn-default btn-flat">个人设置</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route("tw.logout")}}" class="btn btn-default btn-flat">退出登录</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>