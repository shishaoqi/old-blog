<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('front/blog-home/css/bootstrap.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('front/blog-home/css/blog-home.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <ol id="breadcrumbs" class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
                    <li typeof="v:Breadcrumb">
                        <a rel="v:url" property="v:title" href="http://laravelacademy.org/">首页</a>
                    </li>
                    <li typeof="v:Breadcrumb">
                        <a rel="v:url" property="v:title" href="http://laravelacademy.org/tutorials">教程</a>
                    </li>
                    <li typeof="v:Breadcrumb">
                        <a rel="v:url" property="v:title" href="http://laravelacademy.org/tutorials/blog">博客系列</a>
                    </li>
                    <li class="active" typeof="v:Breadcrumb">
                        <span property="v:title">基于Laravel开发博客应用系列 —— 十分钟搭建博客系统</span>
                    </li>
                </ol>

                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <article id="post-2265" class="post-2265 post type-post status-publish format-standard has-post-thumbnail hentry category-blog tag-laravel tag-333 tag-26 tag-421 tag-335 tag-89 tag-86 tag-38 tag-23 tag-82 tag-12">
                            <header class="entry-header page-header">
                                <h1 class="entry-title">基于Laravel开发博客应用系列 —— 十分钟搭建博客系统</h1>
                                    <div class="entry-meta text-muted">
                                        <span class="posted-on"><i class="glyphicon glyphicon-calendar"></i> Posted on <a href="http://laravelacademy.org/post/2265.html" rel="bookmark"><time class="entry-date published" datetime="2015-11-29T22:25:22+08:00">2015年11月29日</time><time class="updated" datetime="2015-11-29T22:27:05+08:00">2015年11月29日</time></a></span><span class="byline"> by <span class="author vcard"><i class="glyphicon glyphicon-user"></i> <a class="url fn n" href="http://laravelacademy.org/post/author/nonfu">学院君</a></span></span>
                                    </div>
                                    <!-- .entry-meta -->
                            </header>
                            <!-- .entry-header -->
                            <div class="entry-content">
                                <p>本节开始我们将正式开始<a href="http://laravelacademy.org/tags/%e5%8d%9a%e5%ae%a2" title="View all posts in 博客" target="_blank">博客</a>项目的代码编写，借助于 <a href="http://laravelacademy.org/tags/laravel" title="View all posts in Laravel" target="_blank">Laravel</a> 5.1 的强大功能，我们可以在十分钟内搭建起一个博客应用，当然这其中不包括任何花里胡哨的点缀之物，也不包括后台管理系统（这些我们在后续章节中会一一加进来）。</p>
                                <h3 id="ipt_kb_toc_2265_0"><strong>1、创建文章<a href="http://laravelacademy.org/tags/%e6%95%b0%e6%8d%ae%e8%a1%a8" title="View all posts in 数据表" target="_blank">数据表</a>及其<a href="http://laravelacademy.org/tags/%e6%a8%a1%e5%9e%8b" title="View all posts in 模型" target="_blank">模型</a>（0:00~2:30）</strong></h3>
                                <p>我们已经在<a href="http://laravelacademy.org/post/2249.html">上一节</a>中为博客项目完成了大部分准备工作，现在首先要做的就是为这个项目创建一个新的文章表 <code>posts</code> 及该表对应的模型类 <code>Post</code>，使用如下Artisan命令即可完成这两个创建工作：</p>
                                <pre>php artisan make:model --migration Post</pre>
                                <p>上述命令会做两件事情：</p>
                                <ul>
                                    <li>在 <code>app</code> 目录下创建模型类 <code>App\Post</code>；</li>
                                    <li>创建用于创建 <code>posts</code> 表的<a href="http://laravelacademy.org/tags/%e8%bf%81%e7%a7%bb" title="View all posts in 迁移" target="_blank">迁移</a>，该迁移文件位于 <code>database/migrations</code> 目录下。</li>
                                </ul>
                                <blockquote>
                                    <p>注：如果不了解什么是迁移，可参考 <a href="http://laravelacademy.org/post/130.html">Laravel 迁移文档</a>。</p>
                                </blockquote>
                                <p>编辑 <code>database/migrations</code> 目录下刚生成的这个迁移文件内容如下：</p>
                            </div>
                        </article>
                    </main>
                </div>
                <!-- .entry-content -->


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{asset('common/js/jquery-1.11.1.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('front/blog-home/js/bootstrap.min.js')}}"></script>
</body>

</html>
