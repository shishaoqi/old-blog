<ul id="main-menu" class="main-menu">
    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
    <?php $menus=Request::get('left_menu'); ?>
    @foreach($menus as $v)
    <li @if(isset($v['active'])) class="opened active" @endif>
        <a href="dashboard-1.html">
            <i class="linecons-cog"></i>
            <span class="title">{{$v['display_name']}}</span>
        </a>
        @if(isset($v['_child']))
        <ul>
        @foreach($v['_child'] as $child_first)
            <li @if(isset($child_first['active'])) class="active" @endif>
                <a href="{{url($child_first['name'])}}">
                    <span class="title">{{$child_first['display_name']}}</span>
                </a>
            </li>
        @endforeach
        </ul>
        @endif
    </li>
    @endforeach

    <!-- <li class="opened active">
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
                <a href="{{url('admin/article')}}">
                    <span class="title">文章列表</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/tag')}}">
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
                <a href="{{url('admin/user/manage')}}">
                    <span class="title">用户列表</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/role/index')}}">
                    <span class="title">角色列表</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/permission/manage')}}">
                    <span class="title">权限列表</span>
                </a>
            </li>
            <li>
                <a href="charts-map.html">
                    <span class="title">系统日志</span>
                </a>
            </li>
            <li>
                <a href="charts-gauges.html">
                    <span class="title">菜单列表</span>
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
    </li> -->
</ul>
