<ul id="main-menu" class="main-menu">
    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
    <li class="active opened active">
        <a href="dashboard-1.html">
            <i class="linecons-cog"></i>
            <span class="title">博客管理</span>
        </a>
        <ul>
            <li class="active">
                <a href="{{url('admin/category')}}">
                    <span class="title">分类管理</span>
                </a>
            </li>
            <li>
                <a href="dashboard-2.html">
                    <span class="title">文章管理</span>
                </a>
            </li>
            <li>
                <a href="dashboard-3.html">
                    <span class="title">标签管理</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="charts-main.html">
            <i class="linecons-globe"></i>
            <span class="title">系统管理</span>
        </a>
        <ul>
            <li>
                <a href="charts-main.html">
                    <span class="title">用户管理</span>
                </a>
            </li>
            <li>
                <a href="charts-range.html">
                    <span class="title">角色管理</span>
                </a>
            </li>
            <li>
                <a href="charts-sparklines.html">
                    <span class="title">权限管理</span>
                </a>
            </li>
            <li>
                <a href="charts-map.html">
                    <span class="title">系统日志管理</span>
                </a>
            </li>
            <li>
                <a href="charts-gauges.html">
                    <span class="title">菜单管理</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="linecons-cloud"></i>
            <span class="title">Menu Levels</span>
        </a>
        <ul>
            <li>
                <a href="#">
                    <i class="entypo-flow-line"></i>
                    <span class="title">Menu Level 1.1</span>
                </a>
                <ul>
                    <li>
                        <a href="#">
                            <i class="entypo-flow-parallel"></i>
                            <span class="title">Menu Level 2.1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="entypo-flow-parallel"></i>
                            <span class="title">Menu Level 2.2</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="entypo-flow-cascade"></i>
                                    <span class="title">Menu Level 3.1</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="entypo-flow-cascade"></i>
                                    <span class="title">Menu Level 3.2</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="entypo-flow-branch"></i>
                                            <span class="title">Menu Level 4.1</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="entypo-flow-parallel"></i>
                            <span class="title">Menu Level 2.3</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>